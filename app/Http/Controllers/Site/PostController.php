<?php

namespace App\Http\Controllers\Site;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Article;
use App\Models\Item;
use App\Models\ItemFavourite;
use App\Models\ItemImage;
use App\Models\Like;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($type = "normal", Request $request)
    {
        $user   = \Auth::user();
        $userId = !empty($user->id) ? $user->id : 0;

        $data = [];
        $data['sliders'] = Slider::where('status', '=', 1)->get();
        $data['categories'] = Category::get();
        $posts = Item::select('items.*', 'u.name as author', \DB::raw("IF(if.itemId > 0, 1, 0) as is_favorite"))
                        ->leftjoin('users as u','u.id','fromUserId')
                        ->leftJoin("item_favorites as if", function($query) use ($userId) {
                            $query->on('if.itemId','items.id');
                            $query->where('if.userId', $userId);
                            // $query->where('if.type', 'post');
                        })
                        ->where('post_type', $type)
                        ->orderBy('updated_at', 'DESC');
        $searchParam = [];

        if(!empty($request->cat)) {
            $posts->where(function($where) use($request) {
                $where->where('category', $request->cat);
                $where->orWhere('subCategory', $request->cat);
            });
            $searchParam['cat'] = $request->cat;
        }

        if(!empty($request->q)) {
            $posts->where(function($where) use($request) {
                $where->where('itemTitle', 'LIKE', '%' . $request->q . '%');
                $where->orWhere('itemDesc', 'LIKE', '%' . $request->q . '%');
            });
            $searchParam['q'] = $request->q;
        }
        
        $data['posts'] = $posts->paginate(5);
        
        // print_r($data['articles']->toArray());
        // exit;
        return view('site.post-list', compact('data'));
    }

    public function postShow($slug, Request $request)
    {
        $user   = \Auth::user();
        $userId = !empty($user->id) ? $user->id : 0;

        $data = [];
        $post = Item::select('items.*', 'u.username as author', 'u.phone', \DB::raw("IF(if.itemId > 0, 1, 0) as is_favorite"), \DB::raw("IF(l.itemId > 0, 1, 0) as is_liked"))
                        ->with('images')
                        ->with('itemComments')
                        ->leftjoin('users as u','u.id','fromUserId')
                        ->leftJoin("item_favorites as if", function($query) use ($userId) {
                            $query->on('if.itemId','items.id');
                            $query->where('if.userId', $userId);
                            // $query->where('if.type', 'post');
                        })
                        ->leftJoin("likes as l", function($query) use ($userId) {
                            $query->on('l.itemId','items.id');
                            $query->where('l.fromUserId', $userId);
                            // $query->where('l.type', 'post');
                        })
                        ->where('post_type', 'normal')
                        ->where('items.id', $slug)
                        ->first();

        if (!empty($post)) {
            $post->relatedPosts = $post->getRelatedPost();
            return view('site.post-detail', compact('data', 'post'));
        } else {
            abort(404);
        }
    }

    public function auctionShow($slug, Request $request)
    {
        $user   = \Auth::user();
        $userId = !empty($user->id) ? $user->id : 0;

        $data = [];
        $post = Item::select('items.*', 'u.username as author', 'u.phone')
                        ->with('images')
                        ->with('biddingObject')
                        ->leftjoin('users as u','u.id','fromUserId')
                        ->where('post_type', 'auction')
                        ->where('items.id', $slug)
                        ->first();

        if (!empty($post)) {
            return view('site.auction-detail', compact('data', 'post'));
        } else {
            abort(404);
        }
    }

    public function loadPostOrAuctionModal($type = 0, $id = 0, Request $request)
    {
        $data = $post = [];
        $type = !empty($request->type) ? $request->type : 'normal';
        $cities = City::all();
        $categories = Category::where('mainCategoryId',0)->get(['id','title','english_title']);

        if(!empty($id)){
            $post = Item::select('items.*', 'u.username as author', 'u.phone', 'c.title as sub_category', 'c.english_title as sub_category_en')
            ->with('images')
            ->leftjoin('users as u','u.id','fromUserId')
            ->leftjoin('category as c','c.id','subCategory')
            ->where('post_type', $type)
            ->where('items.id', $id)
            ->first();
        }

        $data['type'] = $type;

        return view('site.post-auction-modal', compact('data', 'post', 'cities', 'categories'));
    }

    public function savePost(Request $request)
    {
        $user_id = \Auth::user()->id;
        $id      = $request->id;

        // Put validation
        $validator = Validator::make($request->all(), [
            'imgUrl'   => 'required_without:old_imgUrl|mimes:jpeg,jpg,png,gif,svg,wbmp,webp',
            'sex'      => 'required|in:male,female',
            'passport' => 'required|in:yes,no',
            'category' => 'required',
            'age'      => 'required',
            'itemTitle'=> 'required',
            'post_type'=> 'required',
            // 'videoUrl' => 'required_if:old_videoUrl,""|required_if:post_type,auction|mimes:mp4,3gp,avi,mpeg,flv,mov,qt',
            'videoUrl' => 'mimes:mp4,3gp,avi,mpeg,flv,mov,qt',
            'min_bid'  => 'required_if:post_type,auction',
            'expiry_days'  => 'required_if:post_type,auction',
            'expiry_hours'  => 'required_if:post_type,auction',
        ], [
            "imgUrl.required_without" => "Please Select Image",
            "min_bid.required_if" => "Please Enter Bid Price",
            "expiry_days.required_if" => "Please Select Bid day",
            "expiry_hours.required_if" => "Please Select Bid hours",
        ]);

        $validator->sometimes('videoUrl', 'required', function($input){
            return (($input->old_videoUrl == '') && ($input->post_type == 'auction'));
        });

        if ($validator->fails()) {
            return response()->json([
                'status'  => 402,
                'error'   => true,
                'message' => trans('messages.validation_error'),
                'errors'   => $validator->errors(),
            ], 200);
        }

        $imagePath = public_path('uploads/ad/');
        $videoPath = public_path('uploads/ad_video/');

        // $blance = array(
        //     'fromUserId'      => $user_id,
        //     'priority'        => $request->priority??0,
        //     'category'        => $request->category,
        //     // 'subCategory'     => $request->subCategory,
        //     'itemTitle'       => $request->itemTitle,
        //     'itemDesc'        => $request->itemDesc,
        //     'showComments'    => $request->showComments ? 1 : 0,
        //     'showPhoneNumber' => $request->showPhoneNumber ? 1 : 0,
        //     'showMessage'     => $request->showMessage ? 1 : 0,
        //     'showWhatsapp'    => $request->showWhatsapp ? $request->showWhatsapp : 0,
        //     'city'            => $request->city,
        //     'age'             => !empty($request->age) ? $request->age : "",
        //     'sex'             => !empty($request->sex) ? strtolower($request->sex) : 'male',
        //     'passport'        => !empty($request->passport) ? $request->passport : "no",
        //     'vaccine_detail'  => !empty($request->vaccine_detail) ? strtolower($request->vaccine_detail) : '',
        //     'country'         => !empty($request->country) ? $request->country : "",
        //     'post_type'       => $request->post_type,
        //     'min_bid'         => $request->min_bid,
        //     'expiry_days'     => $request->expiry_days,
        //     'expiry_hours'    => $request->expiry_hours,
        //     'updated_at'      => Carbon::now()->format('Y-m-d H:i'),
        // );

        if (!empty($id)) {
            $item = Item::find($id);
            // if (!empty($item)) {
            //     // $item->update($blance);
            // }
        } else {
            // $blance['created_at'] = Carbon::now()->format('Y-m-d H:i');
            $item = new Item();
            $item->created_at = Carbon::now()->format('Y-m-d H:i');
            // $item->save();
        }

        $item->fromUserId      = $user_id;
        $item->priority        = $request->priority??0;
        $item->category        = $request->category;
        $item->subCategory     = !empty($request->subCategory) ? $request->subCategory : 0;
        $item->itemTitle       = $request->itemTitle;
        $item->itemDesc        = $request->itemDesc;
        $item->showComments    = $request->showComments ? 1 : 0;
        $item->showPhoneNumber = $request->showPhoneNumber ? 1 : 0;
        $item->showMessage     = $request->showMessage ? 1 : 0;
        $item->showWhatsapp    = $request->showWhatsapp ? $request->showWhatsapp : 0;
        $item->city            = $request->city;
        $item->age             = !empty($request->age) ? $request->age : "";
        $item->sex             = !empty($request->sex) ? strtolower($request->sex) : "male";
        $item->passport        = !empty($request->passport) ? $request->passport : "no";
        $item->vaccine_detail  = !empty($request->vaccine_detail) ? strtolower($request->vaccine_detail) : "";
        $item->country         = !empty($request->country) ? $request->country : "";
        $item->post_type       = $request->post_type;
        $item->min_bid         = $request->min_bid;
        $item->expiry_days     = $request->expiry_days;
        $item->expiry_hours    = $request->expiry_hours;
        $item->updated_at      = Carbon::now()->format("Y-m-d H:i");

        $item->save();

        // $id = DB::table('items')->insertGetId($blance);
        $id = $item->id;
        if ($id) {

            // Upload image in ad item
            $imageUrl = !empty($request->old_imgUrl) ? $request->old_imgUrl : "";
            if ($request->hasFile('imgUrl')) {
                $image     = $request->file('imgUrl');
                $imageName = time() . '_' . $id . '.' . $image->getClientOriginalExtension();
                $image->move($imagePath, $imageName);
                $imageUrl = $imageName;
            }

            // Upload video in ad item
            $videoUrl = !empty($request->old_videoUrl) ? $request->old_videoUrl : "";
            if ($request->hasFile('videoUrl')) {
                $video     = $request->file('videoUrl');
                $videoName = time() . '_' . $id . '.' . $video->getClientOriginalExtension();
                $video->move($videoPath, $videoName);
                $videoUrl = $videoName;
            }

            // save video and image in ad item
            $item           = Item::where('id', '=', $id)->first();
            $item->imgUrl   = $imageUrl;
            $item->videoUrl = $videoUrl;
            $item->save();

             if ($request->hasFile('images')) {
                $images    = $request->file('images');
                $allImages = [];
                foreach ($images as $k => $image) {
                    $imageName = time() . $k . '_' . $id . '.' . $image->getClientOriginalExtension();
                    $image->move($imagePath, $imageName);
                    $imageUrl = $imageName;

                    $allImages[] = [
                        'item_id'   => $id,
                        'file_name' => $imageUrl,
                    ];
                }

                if (!empty($allImages)) {
                    $image = ItemImage::insert($allImages);
                }
            } 

            $dr['error']  = false;
            $dr['status'] = 200;
            $dr['message'] = trans('messages.post_added');
        } else {

            $dr['status'] = 104;
            $dr['error']  = true;
            $dr['message'] = trans('messages.unable_to_process_request');
        }
        return response()->json($dr);
    }

    public function getSubcategory(Request $request)
    {
        $data = [];
        $cities = City::all();
        $categories = Category::where('mainCategoryId',">",0)->select('id','title','english_title');

        if (!empty($request->cat_id)) {
            $categories->where('mainCategoryId', $request->cat_id);
        }

        if (!empty($request->search)) {
            $categories->where(function($where) use($request) {
                $where->where('title', 'LIKE', '%' . $request->search . '%');
                $where->orWhere('english_title', 'LIKE', '%' . $request->search . '%');
            });
        }

        $categories = $categories->get();

        $data['results'] = $categories->toArray();
        return response()->json($data);
    }

    public function doFavourite(Request $request)
    {
        $user   = \Auth::user();
        $userId = !empty($user->id) ? $user->id : 0;
        
        $item = ItemFavourite::where('itemId',$request->id)->where('userId', $userId)->first();

        if (!empty($item)) {
            $item->delete();
            $msg = trans('messages.item_removed_fvrt');
        } else{
            $insert = [
                'itemId' => $request->id,
                'userId' => $userId,
                'co'     => date('Y-m-d H:i:s'),
                'uo'     => date('Y-m-d H:i:s'),
            ];
            ItemFavourite::insert($insert);
            $msg = trans('messages.item_added_fvrt');
        }

        return response()->json(['status'=>200, 'message'=>$msg]);
    }

    public function doLike(Request $request)
    {
        $user   = \Auth::user();
        $userId = !empty($user->id) ? $user->id : 0;
        
        $item = Like::where('itemId',$request->id)->where('fromUserId', $userId)->first();

        if (!empty($item)) {
            $item->delete();
            $msg = trans('messages.unliked');
        } else{
            $insert = [
                'itemId' => $request->id,
                'fromUserId' => $userId,
                'createAt'   => time(),
            ];
            Like::insert($insert);
            $msg = trans('messages.liked');
        }

        return response()->json(['status'=>200, 'message'=>$msg]);
    }

}
