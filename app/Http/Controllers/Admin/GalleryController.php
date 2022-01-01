<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\ServiceProduct;
use Validator;
use Image;


class GalleryController extends Controller

{
    

    public function index(Request $request){ 
    $galleries = Gallery::get();    
    $page_title = 'Manage Gallery';
    return view('admin/gallery/index', compact('page_title', 'galleries'));    
   }

     public function create(Request $request){                 
       $page_title = 'Add Gallery';
       return view('admin/gallery/add', compact('page_title'));    
      }

     public function store(Request $request){ 
        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        
        $gallery->status = $request->get('status',0);
        $gallery->save();

       if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $fileName = time() . "gallery." . $main_image->getClientOriginalExtension();
            $main_image->move(public_path('uploads/gallery/'), $fileName);

            if ($gallery->main_image != 'photo.jpg' && is_file(public_path('uploads/gallery/' . $gallery->main_image))) {
                unlink(public_path('uploads/gallery/' . $gallery->main_image));
            }
            $gallery->main_image = $fileName;
            $gallery->save();
        }

        
     return redirect()->route('admin.gallery.show')->with('success', 'saved');

            
   }

    public function show($id) {

       $gallery = Gallery::where('id', '=', $id)->first();
       return view('admin/gallery/edit', compact('gallery'));    
    }

    


     public function update(Request $request, $id) {

            $gallery = Gallery::where('id', '=', $id)->first();
            $gallery->title = $request->title;
            $gallery->description = $request->description;
            $gallery->status = $request->get('status',0);
            $gallery->save();

         if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $fileName = time() . "gallery." . $main_image->getClientOriginalExtension();
            $main_image->move(public_path('uploads/gallery/'), $fileName);

            if ($gallery->main_image != 'photo.jpg' && is_file(public_path('uploads/gallery/' . $gallery->main_image))) {
                unlink(public_path('uploads/gallery/' . $gallery->main_image));
            }
            $gallery->main_image = $fileName;
            $gallery->save();
        }

        
         return redirect()->route('admin.gallery.show')->with('success', 'saved');
    }


      public function destroy($id) {
        $gallery = Gallery::find($id); 
        $gallery->delete(); //delete the client
        return redirect()->route('admin.gallery.show')->with('success', 'saved');
    }

   


    

}

