<?php

namespace App\Http\Controllers\Site;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Article;
use App\Models\Item;
use App\Models\ItemImage;
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
        $data = [];
        $data['sliders'] = Slider::where('status', '=', 1)->get();
        $data['categories'] = Category::get();
        $posts = Item::select('items.*', 'u.name as author')
                        ->leftjoin('users as u','u.id','fromUserId')
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
        $data = [];
        $post = Item::select('items.*', 'u.username as author', 'u.phone')
                        ->with('images')
                        ->with('itemComments')
                        ->leftjoin('users as u','u.id','fromUserId')
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
            $post = Item::select('items.*', 'u.username as author', 'u.phone')
            ->with('images')
            ->leftjoin('users as u','u.id','fromUserId')
            ->where('post_type', $type)
            ->where('items.id', $id)
            ->first();
        }

        return view('site.post-auction-modal', compact('data', 'post', 'cities', 'categories'));
    }

    public function savePost(Request $request)
    {
        $user_id = \Auth::user()->id;
        $id      = $request->id;

        // Put validation
        $validator = Validator::make($request->all(), [
            'imgUrl'   => 'required_without:videoUrl|mimes:jpeg,jpg,png,gif,svg,wbmp,webp',
            'videoUrl' => 'required_without:imgUrl|mimes:mp4,3gp,avi,mpeg,flv,mov,qt',
            'sex'      => 'required|in:male,female',
            'passport' => 'required|in:yes,no',
            'category' => 'required',
            'age'      => 'required',
            'itemTitle'=> 'required',
        ]);

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

        $blance = array(
            'fromUserId'      => $user_id,
            'priority'        => $request->priority??0,
            'category'        => $request->category,
            // 'subCategory'     => $request->subCategory,
            'itemTitle'       => $request->itemTitle,
            'itemDesc'        => $request->itemDesc,
            'showComments'    => $request->showComments ? 1 : 0,
            'showPhoneNumber' => $request->showPhoneNumber ? 1 : 0,
            'showMessage'     => $request->showMessage ? 1 : 0,
            'showWhatsapp'    => $request->showWhatsapp ? $request->showWhatsapp : 0,
            'city'            => $request->city,
            'age'             => !empty($request->age) ? $request->age : "",
            'sex'             => !empty($request->sex) ? strtolower($request->sex) : 'male',
            'passport'        => !empty($request->passport) ? $request->passport : "no",
            'vaccine_detail'  => !empty($request->vaccine_detail) ? strtolower($request->vaccine_detail) : '',
            'country'         => !empty($request->country) ? $request->country : "",
            'created_at'      => Carbon::now()->format('Y-m-d H:i'),
            'updated_at'      => Carbon::now()->format('Y-m-d H:i'),
        );

        if (!empty($id)) {
            $item = Item::find($id);
            if (!empty($item)) {
                $item->update($blance);
            }
        } else {
            $item = new Item($blance);
            $item->save();
        }

        // $id = DB::table('items')->insertGetId($blance);
        $id = $item->id;
        if ($id) {

            // Upload image in ad item
            $imageUrl = "";
            if ($request->hasFile('imgUrl')) {
                $image     = $request->file('imgUrl');
                $imageName = time() . '_' . $id . '.' . $image->getClientOriginalExtension();
                $image->move($imagePath, $imageName);
                $imageUrl = $imageName;
            }

            // Upload video in ad item
            $videoUrl = "";
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

            /* if ($request->hasFile('images')) {
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
            } */

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

        $categories = $categories->get();

        $data['results'] = $categories->toArray();
        return response()->json($data);
    }

}
