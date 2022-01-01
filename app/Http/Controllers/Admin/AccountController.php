<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use Validator;
use Image;
use Response;
use App\Models\User;
use App\Helpers\SmsHelper;
use DB;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        $accounts = User::get();
        $page_title = 'Manage accounts';

        return view('admin/account/index', compact('page_title', 'accounts'));
    }

    public function create(Request $request)
    {
        $page_title = 'Add accounts';
        return view('admin/account/add', compact('page_title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'username' => 'required',
            'contact_no' => 'required',
            'password' => 'min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $password = Hash::make($request->password);
        $account = new User;
        $account->email = $request->email;
        $account->username = $request->username;
        $account->phone = $request->contact_no;
        $account->password = $password;
        if ($request->get('status', 0) == 1) {
            $account->status = 'Yes';
        } else {
            $account->status = 'No';
        }
        $account->save();
        return redirect()->route('admin.account.show')->with('success', 'saved');
    }

    public function show($id)
    {
        $account = User::where('id', '=', $id)->first();
        return view('admin/account/edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $account = User::find($id);
        $account->email = $request->email;
        $account->username = $request->username;
        $account->phone = $request->contact_no;
        if ($request->get('status', 0) == 1) {
            $account->status = 'Yes';
            $account->verify = '1';
        } else {
            $account->status = 'No';
            $account->verify = '0';
        }

        if (empty($request->password)) {
            $account->password = $request->oldpassword;
        } else {

            $password = Hash::make($request->password);
            $account->password = $password;
        }

        $account->save();
        return redirect()->route('admin.account.show')->with('success', 'saved');
    }

    public function destroy($id)
    {
        $p = User::find($id);
        $p->delete(); //delete the client
        return redirect()->route('admin.account.show')->with('success', 'saved');
    }

    public function updatedescliamer(Request $request)
    {
        $id = $request->user_id;
        $account = User::find($id);
        if($account){

            $account->disclaimer = '1';
            $data = $account->save();
            if ($data) {
                $dr['error'] = false;
                $dr['status'] = '200';
                // $dr['message']='Report Added successfully';
                //   $dr['message'] = 'تم التبيلغ عن الاعلان';
                $dr['message'] = trans('messages.report_added');
            }
        } else {
            $dr['error'] = true;
            $dr['status'] = '100';
            // $dr['message']='Report Added successfully';
            //   $dr['message'] = 'تم التبيلغ عن الاعلان';
            $dr['message'] = trans('messages.no_data');
        }

        return Response::json($dr);

    }

    public function registerapi(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['message'] = 'unable to process this request. Please try again later.';
        $dr['message'] = trans('messages.unable_to_process_request');
        // $dr['message'] = 'يرجى المحاولة لاحقا';
        $user_name = $request->username;
        // $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $passw_hash = md5($password);

        $usernames = DB::table('users')->select('login')->get();
        $digits=6;
        $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
        // $otp = rand(10, 1000000);

        $check = User::where('username', $user_name)->first();
        if($check)
        {
            $dr['status'] = 102;
            $dr['error'] = true;
            // $dr['message'] = 'username already in use, Please try another one.';
            $dr['message'] = trans('messages.username_exists');
            //   $dr['message'] = 'عفوا..اسم المستخدم المدخل غير متوفر';

            return Response::json($dr);

        }

        $check = User::where('phone', $phone)->first();
        if($check)
        {
            $dr['status'] = 102;
            $dr['error'] = true;
            // $dr['message'] = 'username already in use, Please try another one.';
            $dr['message'] = trans('messages.phone_exists');
            //   $dr['message'] = 'عفوا..اسم المستخدم المدخل غير متوفر';

            return Response::json($dr);
        }

        $db_dtl = DB::table('users')->select('*')->where('phone', '=', $phone)->orWhere('username', '=', $user_name)->get();

        $blance = array(
            'username' => $user_name,
            'password' => $passw_hash,
            'phone' => $phone,
            'verify' => 0,
            'otp' => $otp,
        );
        $inserted = DB::table('users')->insert($blance);
        if ($inserted) {
            // $message = 'Here is your OTP Code '.$otp.'. Please Verify Your account';
            //   $message = 'الرجاء إدخال رمز التحقق ' . $otp . '. للاستمرار بعملية التسجيل في تطبيق ZOOLIFE';
            $message = trans('messages.verify_account').' ' . $otp .' '. trans('messages.here_is_otp_code');
            $smsRes = SmsHelper::sendSMS($phone, $message);
            $dr['smsRes'] = $smsRes;
            $dr['status'] = 200;
            $dr['error'] = false;
            $dr['otp'] = $otp;
            // $dr['message'] = 'Your account has been created successfully. Please check your Phone.';
            $dr['message'] = trans('messages.account_created_check_phone');
            //   $dr['message'] = 'تم انشاء حسابك بنجاح';
        } else {
            $dr['status'] = 104;
            $dr['error'] = true;
            // $dr['message'] = 'Unable to Process your Request. Please try latter.';
            //   $dr['message'] = 'عفوا تم ايقاف حسابك';
            $dr['message'] = trans('messages.unable_to_process_request');

            //   $dr['message'] = 'عفوا تم ايقاف حسابك';
        }

        return Response::json($dr);
    }

    public function verify_otp(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['message'] = 'عفوا....اسم المستخدم/رقم الهاتف  غير مسجل لدينا';
        $dr['message'] = trans('messages.unable_to_send_otp');

        $otp = $request->otp;
        $phone = $request->phone;
        $res = User::where('phone', $phone)->where('otp', $otp)->first();
        // print_r($res);
        // die();
        if ($res) {
            $id = $res->id;

            $blance = array(
                'verify' => 1,
                'otp' => null,
            );
            $res->update($blance);

            $dr['status'] = 200;
            $dr['error'] = false;
            $dr['data'] = $res;
            // $dr['message'] = 'Your account is verified.';
            $dr['message'] = trans('messages.account_verified');
        } else {
            $dr['error'] = true;
            $dr['data'] = [];
            // $dr['message'] = 'Invalid Username/Email/Phone, Please try again.';
            $dr['message'] = trans('messages.invalid_Username/Email/Phone');
        }
        return Response::json($dr);
    }
    public function resend_otp(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['message'] = 'We are unable to send OTP or Account does not exist, Please try again.';
        // $dr['message'] = 'عفوا....اسم المستخدم/رقم الهاتف  غير مسجل لدينا';
        $dr['message'] = trans('messages.unable_to_send_otp');

        $digits=6;
        $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
        // $otp = rand(10, 1000000);
        $user_id = $request->phone;
        $res = User::where('phone', $user_id)->where('verify', '=', 0)->first();
        if ($res) {
            // $id = $res->id;
            $blance = array(
                'otp' => $otp
            );
            $data = $res->update($blance);
            $phone = $res->phone;
            // $message = 'Here is your OTP Code '.$otp.'. Please Verify Your account';
                $message = trans('messages.verify_account').' ' . $otp .' '. trans('messages.here_is_otp_code');
                    // $message = trans('messages.verify_account') . $otp . trans('messages.here_is_otp_code');
            //   $message = 'الرجاء إدخال رمز التحقق ' . $otp . '. للاستمرار بعملية التسجيل في تطبيق ZOOLIFE';
            $smsRes = SmsHelper::sendSMS($phone, $message);
            $dr['smsRes'] = $smsRes;
            $dr['status'] = 200;
            $dr['error'] = false;
            $dr['otp'] = $otp;
            $dr['data'] = $res;
            // $dr['message'] = 'OTP has been resent. Check your Phone.';
            // $dr['message'] = 'تم اعاده ارسال رمز التحقق';
            $dr['message'] = trans('messages.otp_resent');

        }
        return Response::json($dr);
    }
    public function loginapi(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        $dr['message'] = 'Your Email/Phone is invalid';

        $phone = $request->phone;
        $password = $request->password;
        $userCheck = User::where('phone', $phone)->first();

        if ($userCheck) {

            if ($userCheck->verify != 1) {
                $dr['error'] = true;
                $dr['message'] = trans('messages.account_not_active');
            } else {
                $passw_hash = md5($password);

                // $res = DB::table('users')->select('*')->where('phone', '=', $phone)->where('password', '=', $passw_hash)->get();
                $res = User::where('phone', $phone)->where('password', $passw_hash)->get();
                if (count($res) > 0) {
                    $dr['status'] = 200;
                    $dr['error'] = false;
                    // $dr['message'] = 'You have successfully login.';
                    $dr['message'] = trans('messages.login_success');
                    // $dr['message'] = 'تم الدخول الى حسابك بنجاح';
                    $dr['data'] = $res[0];
                } else {
                    $dr['error'] = true;
                    $dr['data'] = [];
                    // $dr['message'] = 'Your Password is incorrect.';
                    // $dr['message'] = 'الرجاء التاكد من كلمة المرور';
                    $dr['message'] = trans('messages.password_incorrect');
                }
            }
        } else {
            $dr['error'] = true;
            $dr['data'] = [];
            // $dr['message'] = 'Your Phone number is incorrect.';

            $dr['message'] =  trans('messages.phone_incorrect');
        }
        return Response::json($dr);
    }

    public function reset_password(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['message'] = 'Unable to process the request. Please try later.';
        // $dr['message'] = 'لايمكن استرجاع كلمة المرور نرجو التاكد من رقم الهاتف';
        $dr['message'] = trans('messages.unable_to_process_request');

        $phone = $request->phone;
        // $res = DB::table('users')->select('*')->where('phone', '=', $phone)->get();
        $res = User::where('phone', $phone)->first();

        if ($res) {
            // $id = $res[0]->id;
            // $otp = rand(10, 1000000);
            $digits=6;
            $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);

            $blance = array(
                'otp' => $otp,
            );
            $res->update($blance);
            $phone = $res->phone;
            // $message = 'Here is your OTP Code '.$otp.'. Please Verify Your account';
            $message = trans('messages.verify_account').' ' . $otp .' '. trans('messages.here_is_otp_code');
                    // $message = trans('messages.verify_account') . $otp . trans('messages.here_is_otp_code');
            //   $message = 'الرجاء إدخال رمز التحقق ' . $otp . '. للاستمرار بعملية التسجيل في تطبيق ZOOLIFE';
            $smsRes = SmsHelper::sendSMS($phone, $message);
            $dr['smsRes'] = $smsRes;
            $dr['status'] = 200;
            $dr['otp'] = $otp;
            $dr['error'] = false;
            // $dr['message'] = 'Check Your Phone and verify using OTP.';
            //   $dr['message'] = 'الرجاء ادخال رمز التحقق المرسل الى هاتفك';
            $dr['message'] = trans('messages.veirfy_otp');
        }
        return Response::json($dr);
    }

    public function update_password(Request $request)
    {

        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['message'] = 'Unable to update password. Please check your username and try again.';
        // $dr['message'] = 'لايمكن استرجاع كلمة المرور نرجو التاكد من رقم الهاتف';
        $dr['message'] = trans('messages.password_update_failed');

        $phone = $request->phone;
        $password = $request->password;
        $res = User::where('phone', '=', $phone)->where('verify', '1')->first();
        if ($res) {
            $id = $res->id;
            $pin =  rand(10, 1000000);
            $hash = md5($password);
            $blance = array(
                'password' => $hash,
            );
            // DB::table('users')->where('id', '=', $id)->update($blance);
            $res->update($blance);
            $dr['status'] = 200;
            $dr['error'] = false;
            // $dr['message'] = 'Your password has been updated.';
            //   $dr['message'] = 'تم تغير كلمة المرور بنجاح';
            $dr['message'] = trans('messages.password_updated');
        }
        return Response::json($dr);
    }
}
