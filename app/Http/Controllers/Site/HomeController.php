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
use App\Models\ServiceProduct;
use App\Models\Home;
use App\Models\Video;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use Cookie;
use Illuminate\Routing\Route;

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
     
    
    
    public function homePage()
    {
         $sliders = Slider::where('status' ,'=', 1)->get();
         $homeCMS = Home::first();          
         $videos = Video::get()->where('status','=','1'); 
         $page_title = 'Solar';
         //dd($videos);       
        return view('site/index', compact('page_title','sliders','homeCMS','videos')); 
        
    }


    public function aboutUsPage(Request $request){      

       $page_title = 'Manage About Us';
       $aboutUsCMS = About::first();
       //dd($aboutUsCMS);
       return view('site/aboutus', compact('page_title', 'aboutUsCMS'));   
         }

    public function galleryPage(Request $request){   

      $galleries = Gallery::get(); 
      $menus = Service::get(); 
      $page_title = 'Gallery'; 
      
      return view('site/gallery', compact('page_title', 'galleries','menus')); 
  }

    public function servicesPage(Request $request){   
        $services = Service::get();
        $menus = Service::get(); 
        $page_title = 'Service';
      
        return view('site/services', compact('page_title', 'services','menus'));
    }

    public function servicesDetail(Request $request,$slug){  
        $menus = Service::get(); 
        $services = Service::where('slug', '=', $slug)->first();
        
        $page_title = 'Service Details';
        $relatedProducts = ServiceProduct::where('service_id', '=', $services->id)->get()->toArray();;
        
        if(is_array($relatedProducts)){
            $products = $relatedProducts;
        }else{
            $products = '';
        }
        
        return view('site/service_detail', compact('page_title', 'services','products','menus'));
    }

    public function contactUsPage(Request $request){     
     $page_title = 'Contact Us';
     $contactUs = Contact::first();
    // dd($contactUs);
      return view('site/contact',compact('page_title','contactUs'));   
    }


public function sendEmailToUser(Request $request){    
   
        $this->validate($request,[
                   'name' => 'required|min:2|string',
                   'email' =>'required|email',
                   'subject' =>'required|min:6',                                      
                   'message' => 'required|min:5'
        ]);
         $data = array(
          'name' => $request->name,
          'email' => $request->email,
          'subject' => $request->subject,
          'message' => $request->message
        );

       
         
         $fromTitle = 'Solar Sales Team';
         $from =  'amanchauhan609@gmail.com';
         
            $subject = $request->subject;
            $email = $request->email;
            $to = $email;
            $toTitle = 'Title';
            $data['to'] = $to;
            $param = [
                'subject' => $subject,
                'from' => ['name' => $fromTitle, 'address' => $from],
                'view' => 'emails.promotion.approvel_and_rejection_notification_to_partner',
                'data' => $data
            ];
            $to = ['name' => $toTitle, 'email' => $to];
            $to = (Object)$to;

            //dd($param);

            Mail::to($to)->send(new SendMail($param));
            


        /* Mail::send([], $data, function($message) use ($data){           
            $message->from($data['email']);
            $message->to('nitishdhiman099@gmail.com');
            $message->subject($data['name']);
        });*/
        
      return redirect()->route('contact.thankyou')->with('success', 'Thank you for contact us!');
    
    }

    public function thankyou(Request $request){  
     $page_title = 'Thank You';
     return view('site/thankyou',compact('page_title'));   
    }

    public function emailSendToAdmin(Request $request){

         $this->validate($request,[
                   'name' => 'required|min:2|string',
                   'email' =>'required|email',
                   'subject' =>'required|min:6',                                      
                   'message' => 'required|min:5'
        ]);
         

         $to = "grant@thesolarsalesteam.com";
         $subject = $request->subject;
         $txt = $request->message;
         $headers = $request->email;

         $send = mail($to,$subject,$txt,$headers);

          return redirect()->route('contact.thankyou')->with('success', 'Thank you for contact us!');

    }

   

}
