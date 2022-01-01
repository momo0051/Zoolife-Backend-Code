<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Product;
use Validator;
use DB;
use Image;
use Auth;



class AdminController extends Controller

{

  public function __construct()
{
    $this->middleware('auth');
       
}

    public function index(Request $request)

    {

    //  $gallery = Gallery::count();
    //  $service = Service::count();
    //  $product = Product::count();
     
     //dd($gallery);


 
        return view('admin/index');

    }

    public function showprofile(Request $request) {

     $admin = Admin::where('role_id','=',1)->first();
     //dd(Auth::user());
     $page_title  = 'Admin Profile';
    return view('admin/profile/profile', compact('admin','page_title'));

    }

    public function profileUpdate(Request $request , $id) {

        $admin = Admin::where('id', '=', $id)->first();
       
        $admin->name = $request->name;
        $admin->email = $request->email;

        $rules = $this->getRules($request, $admin);

        if ($request->p1 != '' || $request->p2 != '') {
            if ($request->p1 != $request->p2) {
                $rules['password'] = 'required|min:6';
            }
        }
        $this->validate($request, $rules);

        if ($request->p1 != '' && $request->p2 != '') {
            if ($request->p1 == $request->p2) {
                $admin->password = bcrypt($request->p1);
            }
        }
        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:png,jpg,gif,jpeg';
        }
        
        //$admin->password = bcrypt($request->p1);
        

       
        $admin->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . "_users_$admin->id." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users/'), $fileName);

            if ($admin->image != 'photo.jpg' && is_file(public_path('uploads/users/' . $admin->image))) {
                unlink(public_path('uploads/users/' . $admin->image));
            }
            $admin->avatar = $fileName;
        }

        $admin->save();

        return redirect()->route('admin.profile.showprofile')->with('success', 'Profile update successfully');

    }

  

    public function aboutUsPage(Request $request){ 
        $aboutUsCMS = About::first();
        $page_title = 'Manage About Us';

     return view('admin/aboutus', compact('page_title', 'aboutUsCMS'));    
   }

     public function createAboutUsPage(Request $request){ 
      
      //dd($request);
      $aboutUsCMS = About::first();
         
      $aboutUsCMS->title = $request->get('title','');
      $aboutUsCMS->description = $request->get('description','');

      $aboutUsCMS->name_one = $request->get('name_one','');
      $aboutUsCMS->name_two = $request->get('name_two','');
      $aboutUsCMS->name_three = $request->get('name_three','');

      $aboutUsCMS->designation_one = $request->get('designation_one','');
      $aboutUsCMS->designation_two = $request->get('designation_two','');
      $aboutUsCMS->designation_three = $request->get('designation_three','');

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . "aboutus_image." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/aboutus_cms/'), $fileName);

            if ($aboutUsCMS->image != 'photo.jpg' && is_file(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image))) {
                unlink(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image));
            }
            $aboutUsCMS->image = $fileName;
            $aboutUsCMS->save();
        }

      $aboutUsCMS->details_one = $request->get('detail_one','');
      

      
      $aboutUsCMS->save();
       if ($request->hasFile('image_one')) {
            $image = $request->file('image_one');
            $fileName = time() . "aboutus_image_one." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/aboutus_cms/'), $fileName);

            if ($aboutUsCMS->image_one != 'photo.jpg' && is_file(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image_one))) {
                unlink(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image_one));
            }
            $aboutUsCMS->image_one = $fileName;
            $aboutUsCMS->save();
        }

         if ($request->hasFile('image_two')) {
            $image = $request->file('image_two');
            $fileName = time() . "aboutus_image_two." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/aboutus_cms/'), $fileName);

            if ($aboutUsCMS->image_two != 'photo.jpg' && is_file(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image_two))) {
                unlink(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image_two));
            }
            $aboutUsCMS->image_two = $fileName;
            $aboutUsCMS->save();
        }

         if ($request->hasFile('image_three')) {
            $image = $request->file('image_three');
            $fileName = time() . "aboutus_image_three." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/aboutus_cms/'), $fileName);

            if ($aboutUsCMS->image_three != 'photo.jpg' && is_file(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image_three))) {
                unlink(public_path('uploads/aboutus_cms/' . $aboutUsCMS->image_three));
            }
            $aboutUsCMS->image_three = $fileName;
            $aboutUsCMS->save();
        }

         
      return redirect()->route('admin.aboutus')->with('success', 'saved');
          
   }

    public function galleryPage(Request $request){     
      return view('admin/gallery');   
    }

    public function servicesPage(Request $request){     
      return view('admin/services');   
    }

    public function contactUsPage(Request $request){    
      $ContactUsCMS = Contact::first();
        $page_title = 'Manage About Us';
 

      return view('admin/contact', compact( 'ContactUsCMS','page_title'));   
    }

     public function contactUsStore(Request $request){     

      $ContactUsCMS = Contact::first();
      $ContactUsCMS->title = $request->title;
      $ContactUsCMS->description = $request->description;               
      $ContactUsCMS->email = $request->email;     
      $ContactUsCMS->contact_no = $request->contact_no;     
      $ContactUsCMS->address_one = $request->address_one;     
      $ContactUsCMS->address_two = $request->address_two;  
      $ContactUsCMS->web_address = $request->web_address;  
         
      $ContactUsCMS->save();

     return redirect()->route('admin.contact')->with('success', 'saved');
  }

   public function footer(Request $request){ 
        $footerCMS = Footer::first();
        $page_title = 'Footer Content Management';
     return view('admin/footer', compact('page_title', 'footerCMS'));    
   }

   public function footerStore(Request $request){ 

       $footerCMS = Footer::first();
      $footerCMS->left_cms_content = $request->detail_one;
      $footerCMS->right_cms_content = $request->detail_two;
      $footerCMS->save();

     return redirect()->route('admin.footer.show')->with('success', 'saved');  
   }

    public function getRules(Request $request, $admin)
    {
        $rules = ['name' => 'required'];
//        $rules['name'] = 'required|unique';
        //       $rules['email'] = 'required|unique';
        if ($admin) {
            if ($request->email && $admin->email != $request->email) {
                $rules['email'] = 'unique:users';
            }
        } else {
            $rules['email'] = 'unique:users';
        }
        return $rules;
    }


    

}

