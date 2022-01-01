<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Validator;



class VideoController extends Controller

{ 
    

    public function index(Request $request){ 
    $videos = Video::get();
    $page_title = 'Manage Videos';
    return view('admin/videos/index', compact('page_title', 'videos'));    
   }

     public function create(Request $request){                 
       $page_title = 'Add Video';
       return view('admin/videos/add', compact('page_title'));    
      }

     public function store(Request $request){ 
      $Video = new Video;
      $Video->link = $request->link;
      $Video->title = $request->title;
      $Video->description = $request->description;
      $Video->status = $request->get('status',0);
      $Video->save();
      return redirect()->route('admin.videos.show')->with('success', 'Video Added Successfully.');

            
   }

     public function show($id) {
        $video = Video::where('id', '=', $id)->first();        
        return view('admin/videos/edit', compact('video'));    
    }

     public function update(Request $request, $id) {
            $Video = Video::where('id', '=', $id)->first();
            $Video->link = $request->link;
            $Video->title = $request->title;
            $Video->description = $request->description;
            $Video->status = $request->get('status',0);
            $Video->save();

         return redirect()->route('admin.videos.show')->with('success', 'Video Update Successfully.');
    }


      public function destroy($id) {
        $v = Video::find($id); 
        $v->delete(); 
        return redirect()->route('admin.videos.show')->with('success', 'Video Delete Successfully.');
    }


    

}

