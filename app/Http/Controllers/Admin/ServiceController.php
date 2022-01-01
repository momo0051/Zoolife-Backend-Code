<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceProduct;
use Validator;
use Image;


class ServiceController extends Controller

{
    

    public function index(Request $request){ 
    $services = Service::get();    
    $page_title = 'Manage services';
    return view('admin/service/index', compact('page_title', 'services'));    
   }

     public function create(Request $request){ 
                
       $page_title = 'Add services';
       return view('admin/service/add', compact('page_title'));    
      }

     public function store(Request $request){ 
        $service = new Service;
        $service->name = $request->name;
        $service->slug = $request->slug;
        $service->heading = $request->heading;
        $service->description = $request->description;
        $service->service_details = $request->service_details;
        $service->banner_heading = $request->banner_heading;
        $service->banner_description = $request->banner_description;
        $service->save();

       if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $fileName = time() . "services." . $main_image->getClientOriginalExtension();
            $main_image->move(public_path('uploads/services/'), $fileName);

            if ($service->main_image != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->main_image))) {
                unlink(public_path('uploads/services/' . $service->main_image));
            }
            $service->main_image = $fileName;
            $service->save();
        }

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $fileName = time() . "services." . $banner_image->getClientOriginalExtension();
            $banner_image->move(public_path('uploads/services/'), $fileName);

            if ($service->banner_image != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->banner_image))) {
                unlink(public_path('uploads/services/' . $service->banner_image));
            }
            $service->banner_image = $fileName;
            $service->save();
        }
        if ($request->hasFile('images_one')) {
            $images_one = $request->file('images_one');
            $fileName = time() . "services." . $images_one->getClientOriginalExtension();
            $images_one->move(public_path('uploads/services/'), $fileName);

            if ($service->images_one != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_one))) {
                unlink(public_path('uploads/services/' . $service->images_one));
            }
            $service->images_one = $fileName;
            $service->save();
        }
        if ($request->hasFile('images_two')) {
            $images_two = $request->file('images_two');
            $fileName = time() . "services." . $images_two->getClientOriginalExtension();
            $images_two->move(public_path('uploads/services/'), $fileName);

            if ($service->images_two != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_two))) {
                unlink(public_path('uploads/services/' . $service->images_two));
            }
            $service->images_two = $fileName;
            $service->save();
        }

        if ($request->hasFile('images_three')) {
            $images_three = $request->file('images_three');
            $fileName = time() . "services." . $images_three->getClientOriginalExtension();
            $images_three->move(public_path('uploads/services/'), $fileName);

            if ($service->images_three != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_three))) {
                unlink(public_path('uploads/services/' . $service->images_three));
            }
            $service->images_three = $fileName;
            $service->save();
        }


        if ($request->hasFile('images_four')) {
            $images_four = $request->file('images_four');
            $fileName = time() . "services." . $images_four->getClientOriginalExtension();
            $images_four->move(public_path('uploads/services/'), $fileName);

            if ($service->images_four != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_four))) {
                unlink(public_path('uploads/services/' . $service->images_four));
            }
            $service->images_four = $fileName;
            $service->save();
        }

     return redirect()->route('admin.services.show')->with('success', 'saved');

            
   }

    public function show($id) {
       $service = Service::where('id', '=', $id)->first();
       return view('admin/service/edit', compact('service'));    
    }

     public function showProduct(Request $request) {
       $products = ServiceProduct::get();
       //dd($products);
       
       return view('admin/service/index2', compact('products'));    
    }

     public function createProduct($id) {
       $service = Service::where('id', '=', $id)->first();
       //dd($service);
       return view('admin/service/create', compact('service'));    
    }

     public function storeProduct(Request $request){ 
        $product = new ServiceProduct;
        $product->name = $request->name;
        $product->service_id = $request->id;
        $product->description = $request->description;
        $product->save();

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . "services." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/services/products/'), $fileName);

            if ($product->imageimage != 'photo.jpg' && is_file(public_path('uploads/services/products/' . $product->imageimage))) {
                unlink(public_path('uploads/services/products/' . $product->imageimage));
            }
            $product->image = $fileName;
            $product->save();
        }
     return redirect()->route('admin.services.product.show')->with('success', 'saved');

            
   }

    public function editProduct($id) {
       $service = ServiceProduct::where('id', '=', $id)->first();
       //dd($service);
       return view('admin/service/edit2', compact('service'));    
    }

    public function updateProduct(Request $request, $id) {
       
         $product = ServiceProduct::where('id', '=', $id)->first();
           
           $product->name = $request->name;
           $product->description = $request->description;
           $product->save();

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . "services." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/services/products/'), $fileName);

            if ($product->imageimage != 'photo.jpg' && is_file(public_path('uploads/services/products/' . $product->imageimage))) {
                unlink(public_path('uploads/services/products/' . $product->imageimage));
            }
            $product->image = $fileName;
            $product->save();
        }
     return redirect()->route('admin.services.product.show')->with('success', 'saved');
    }


     public function update(Request $request, $id) {

            $service = Service::where('id', '=', $id)->first();
            $service->name = $request->name;
            $service->slug = $request->slug;
            $service->heading = $request->heading;
            $service->description = $request->description;
            $service->service_details = $request->service_details;
            $service->banner_heading = $request->banner_heading;
            $service->banner_description = $request->banner_description;
            $service->save();

         if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $fileName = time() . "services." . $main_image->getClientOriginalExtension();
            $main_image->move(public_path('uploads/services/'), $fileName);

            if ($service->main_image != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->main_image))) {
                unlink(public_path('uploads/services/' . $service->main_image));
            }
            $service->main_image = $fileName;
            $service->save();
        }

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $fileName = time() . "services." . $banner_image->getClientOriginalExtension();
            $banner_image->move(public_path('uploads/services/'), $fileName);

            if ($service->banner_image != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->banner_image))) {
                unlink(public_path('uploads/services/' . $service->banner_image));
            }
            $service->banner_image = $fileName;
            $service->save();
        }
        if ($request->hasFile('images_one')) {
            $images_one = $request->file('images_one');
            $fileName = time() . "services." . $images_one->getClientOriginalExtension();
            $images_one->move(public_path('uploads/services/'), $fileName);

            if ($service->images_one != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_one))) {
                unlink(public_path('uploads/services/' . $service->images_one));
            }
            $service->images_one = $fileName;
            $service->save();
        }
        if ($request->hasFile('images_two')) {
            $images_two = $request->file('images_two');
            $fileName = time() . "services." . $images_two->getClientOriginalExtension();
            $images_two->move(public_path('uploads/services/'), $fileName);

            if ($service->images_two != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_two))) {
                unlink(public_path('uploads/services/' . $service->images_two));
            }
            $service->images_two = $fileName;
            $service->save();
        }

        if ($request->hasFile('images_three')) {
            $images_three = $request->file('images_three');
            $fileName = time() . "services." . $images_three->getClientOriginalExtension();
            $images_three->move(public_path('uploads/services/'), $fileName);

            if ($service->images_three != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_three))) {
                unlink(public_path('uploads/services/' . $service->images_three));
            }
            $service->images_three = $fileName;
            $service->save();
        }


        if ($request->hasFile('images_four')) {
            $images_four = $request->file('images_four');
            $fileName = time() . "services." . $images_four->getClientOriginalExtension();
            $images_four->move(public_path('uploads/services/'), $fileName);

            if ($service->images_four != 'photo.jpg' && is_file(public_path('uploads/services/' . $service->images_four))) {
                unlink(public_path('uploads/services/' . $service->images_four));
            }
            $service->images_four = $fileName;
            $service->save();
        }
         return redirect()->route('admin.services.show')->with('success', 'saved');
    }


      public function destroy($id) {
        $p = Service::find($id); 
        $p->delete(); //delete the client
        return redirect()->route('admin.services.show')->with('success', 'saved');
    }

     public function destroyProduct($id) {
        $p = ServiceProduct::find($id); 
        $p->delete(); //delete the client
        return redirect()->route('admin.services.product.show')->with('success', 'saved');
    }


    

}

