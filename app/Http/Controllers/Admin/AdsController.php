<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use DB;
use Illuminate\Http\Request;
use Image;

class AdsController extends Controller
{

    public function index(Request $request)
    {
        $page_title = 'Manage Slider';
        $ads = Item::where('category', '!=', '4000')->orderBy('priority', 'DESC', 'id', 'DESC')->get();
        $per_page = env('PER_PAGE');

        return view('admin/ads/index', compact('page_title', 'ads', 'per_page'));
    }

    public function create(Request $request)
    {
        $page_title = 'Add Ads';
        $categories = Category::where('mainCategoryId', '=', '0')->get();

        return view('admin/ads/add', compact('page_title', 'categories'));
    }

    public function store(Request $request)
    {
        $ads = new Item;

        $ads->itemTitle = $request->itemTitle;
        $ads->city = $request->city;
        $ads->category = $request->category;
        $ads->subCategory = $request->subCategory;
        $ads->itemDesc = $request->itemDesc;
        $ads->showPhoneNumber = $request->get('showPhoneNumber', 0);
        $ads->showMessage = $request->get('showMessage', 0);
        $ads->showComments = $request->get('showComments', 0);
        $ads->phoneViewsCount = $request->get('phoneViewsCount', 0);
        $ads->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            // /dd($images);
            foreach ($images as $k => $image) {
                $fileName = time() . $k . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/ad/'), $fileName);
                $data[] = $fileName;

                if ($ads->image != 'photo.jpg' && is_file(public_path('uploads/ad/' . $ads->image))) {
                    unlink(public_path('uploads/ad/' . $ads->main_image));
                }
            }
            $ads->imgUrl = implode(',', $data);

            $ads->save();

            return redirect()->route('admin.ads.show')->with('success', 'saved');
        }

        return redirect()->route('admin.ads.show')->with('success', 'saved');
    }

    public function show($id)
    {
        $ads = Item::where('id', '=', $id)->first();
        //dd($ads);
        $categories = Category::get();
        $subcategories = Category::get();

        return view('admin/ads/edit', compact('ads', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $cat_check = $request->category;
        if (!empty($cat_check)) {
            $category = $cat_check;
        } else {
            $category = '0';
        }

        $ads = Item::where('id', '=', $id)->first();
        $ads->itemTitle = $request->itemTitle;
        $ads->city = $request->city;
        $ads->category = $category;
        $ads->subCategory = $request->subCategory;
        $ads->itemDesc = $request->itemDesc;
        $ads->priority = $request->priority;
        $ads->likesCount = $request->likesCount;
        $ads->showPhoneNumber = $request->get('showPhoneNumber', 0);
        $ads->showMessage = $request->get('showMessage', 0);
        $ads->showComments = $request->get('showComments', 0);
        $ads->phoneViewsCount = $request->get('phoneViewsCount', 0);
        $ads->save();

        if ($request->hasFile('images')) {

            $images = $request->file('images');
            // /dd($images);
            foreach ($images as $k => $image) {
                $fileName = time() . $k . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/ad/'), $fileName);
                $data[] = $fileName;

                if ($ads->image != 'photo.jpg' && is_file(public_path('uploads/ad/' . $ads->image))) {
                    unlink(public_path('uploads/ad/' . $ads->main_image));
                }
            }
            $ads->imgUrl = implode(',', $data);

            $ads->save();
        }

        return redirect()->route('admin.ads.show')->with('success', 'saved');
    }

    public function destroy($id)
    {
        $ads = Item::find($id);
        $ads->delete();
        return redirect()->route('admin.ads.show')->with('success', 'saved');
    }

    public function getSubcategory(Request $request)
    {
        return Category::where('mainCategoryId', '=', $request->id)->select('id', 'title')->get();
    }

    public function reports()
    {
        $reports = DB::table('items_abuse_reports')
            ->join('users', 'users.id', '=', 'abuseFromUserId')
            ->join('items', 'items.id', '=', 'abuseToItemId')
            ->select('items_abuse_reports.id', 'users.username', 'items.itemTitle')
            ->get();
        //   print_r($reports);
        //   die();
        return view('admin/reports/reports', compact('reports'));
    }
    public function reports_delete($id)
    {
        $reports = DB::table('report')->where('r_id', '=', $id)->delete();
        return redirect()->back();
    }

    public function savePerPage(Request $request)
    {
        if($request->filled('pagination'))
            $this->putPermanentEnv('PER_PAGE', $request->pagination);

        return redirect()->back()->with('success', 'saved');

    }

    public function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('=' . env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}
