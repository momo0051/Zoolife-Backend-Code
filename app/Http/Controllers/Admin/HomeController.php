<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Home;
use Validator;
use Image;


class HomeController extends Controller

{
    

    public function show(Request $request) {
          $homePageCMS = Home::first();
         // dd($homePageCMS);
          $page_title = 'Home Page CMS';
          return view('admin/home/index', compact('page_title','homePageCMS'));    
    }

  

     public function store(Request $request){ 

        $homeCMS = Home::first();

        $homeCMS->title_one = $request->title_one;
        $homeCMS->description_one = $request->description_one;
        $homeCMS->save();
      
        
     return redirect()->route('admin.home.show')->with('success', 'saved');

            
   }

    


    

}

