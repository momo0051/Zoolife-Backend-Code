<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get();
        $page_title = 'Manage products';
        return view('admin/product/index', compact('page_title', 'products'));
    }

    public function create(Request $request)
    {

        $page_title = 'Add products';
        return view('admin/product/add', compact('page_title'));
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->get('status', 0);
        $product->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . "products." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $fileName);

            if ($product->image != 'photo.jpg' && is_file(public_path('uploads/products/' . $product->image))) {
                unlink(public_path('uploads/products/' . $product->image));
            }
            $product->image = $fileName;
            $product->save();
        }

        return redirect()->route('admin.product.show')->with('success', 'saved');

    }

    public function show($id)
    {
        $product = Product::where('id', '=', $id)->first();

        return view('admin/product/edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $Product = Product::where('id', '=', $id)->first();
        $Product->name = $request->name;
        $Product->description = $request->description;

        $Product->status = $request->get('status', 0);
        $Product->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . "products." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $fileName);

            if ($Product->image != 'photo.jpg' && is_file(public_path('uploads/products/' . $Product->image))) {
                unlink(public_path('uploads/products/' . $Product->image));
            }
            $Product->image = $fileName;
            $Product->save();
        }
        return redirect()->route('admin.product.show')->with('success', 'saved');
    }

    public function destroy($id)
    {
        $p = Product::find($id);
        $p->delete(); //delete the client
        return redirect()->route('admin.product.show')->with('success', 'saved');
    }

}
