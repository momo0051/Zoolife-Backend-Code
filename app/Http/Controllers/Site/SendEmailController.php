<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\About;
use App\Models\Product;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Footer;
use App\Models\Admin;
use App\Models\ServiceProduct;
use DB;
use Cookie;
use Mail;
use Illuminate\Routing\Route;

class SendEmailController extends Controller
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
     
    
    
    
    public function store(Request $request){     

        $this->validate($request,[
                   'name' => 'required',
                   'email' =>'required|email',
                   'message' => 'required'
        ]);

        \Mail::send('site.contact', array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => 'Laravel Basic Testing Mail',
                 'phone_number' => $request->get('phone'),
                 'message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('nitishdhiman09@gmail.com');
               });

         return redirect()->route('contact')->with('success', 'Thank you for contact us!');

    
    }




   

}
