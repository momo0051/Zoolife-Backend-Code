<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Article;
use App\Models\Item;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $data = [];
        $data['sliders'] = Slider::where('status', '=', 1)->get();
        $data['categories'] = Category::get();
        $data['articles'] = Article::orderBy('updated_at', 'DESC')->limit(10)->get();
        $data['featuredPosts'] = Item::select('items.*', 'u.name as author')->leftjoin('users as u','u.id','fromUserId')->where('priority','>',0)->orderBy('updated_at', 'DESC')->get();
        $data['posts'] = Item::select('items.*', 'u.name as author')
                        ->leftjoin('users as u','u.id','fromUserId')
                        ->where('post_type', 'normal')
                        ->orderBy('updated_at', 'DESC')
                        ->limit(10)->get();
        $data['auction'] = Item::select('items.*', 'u.name as author')
                        ->leftjoin('users as u','u.id','fromUserId')
                        ->where('post_type', 'auction')
                        ->orderBy('updated_at', 'DESC')
                        ->limit(10)->get();
        
        // print_r($data['articles']->toArray());
        // exit;
        return view('site.home', compact('data'));
    }

}
