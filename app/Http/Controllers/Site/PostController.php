<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Article;
use App\Models\Item;

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
        $data['posts'] = Item::select('items.*', 'u.name as author')
                        ->leftjoin('users as u','u.id','fromUserId')
                        ->where('post_type', $type)
                        ->orderBy('updated_at', 'DESC')
                        ->paginate(5);
        
        // print_r($data['articles']->toArray());
        // exit;
        return view('site.post-list', compact('data'));
    }

    public function postShow($slug, Request $request)
    {
        $data = [];
        $post = Item::select('items.*', 'u.username as author', 'u.phone')
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

}
