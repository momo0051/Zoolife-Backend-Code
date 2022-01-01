<?php

namespace App\Http\Controllers\Admin;

use DB;
use Response;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function add_comments(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        $dr['message'] = trans('messages.account_deleted');
        // $dr['message'] = 'عفوا تم ايقاف حسابك';
        $itemId = $request->id;
        $userId = $request->user_id;
        $blance = array(
            'userId' => $request->user_id,
            'itemId' => $request->id,
            'message' => $request->message,
        );
        $comment = DB::table('item_comments')->insert($blance);

        if ($comment) {
            // $items = DB::table('items')->select('*')->where('id', '=', $itemId)->where('removeAt', '=', 0)->get();
            $item = Item::where('id', '=', $itemId)->where('removeAt', 0)->first();
            $item_title = $item->itemTitle;
            $item_user = $item->fromUserId;

            // $users = DB::table('users')->select('*')->where('id', '=', $item_user)->get();
            $devicetoken = $item->user->device_token;

            // $users = DB::table('items')->select('*')->where('id', '=', $userId)->get();
            // $sender_name = $users[0]->fullname;
            // $msg="$sender_name Posted comment on your Post $item_title";

            // $msg="لديك تعليق جديد على اعلانك $item_title بواسطة  $sender_name";
            // $msg="لديك تعليق جديد على اعلانك $item_title بواسطة $sender_name";
            $msg = "لديك تعليق جديد على اعلانك $item_title";
            $ch = curl_init("https://fcm.googleapis.com/fcm/send");
            $token = $devicetoken;
            $title = "";
            $body = $msg;
            $notification = array('title' => $title, 'body' => $body, 'badge' => 1);
            $arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $notification);
            $json = json_encode($arrayToSend);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key= AAAAde7kDHY:APA91bFx2pRMMhV4qmeMfpXr6Iaj2_1Ey5b3viuEcbB0fmoaPwcIl6l2YLQr9MUR2LsapY-5v47JA2bq3IuVynuq4_ST7IaZFNNwUGMmzxO8wCa3GvTH8wkWwCmaCkPqIl_r5Nbio3oq';
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $content = curl_exec($ch);
            curl_close($ch);

            if ($content) {
                $blance = array(
                    'noti_badge' => 1,
                );
                // $updated = DB::table('users')->select('*')->where('id', '=', $item_user)->update($blance);
                $updated = $item->user()->update($blance);

                // dd($updated);
                if ($updated) {
                    $blance = array(
                        'ads_id' => $itemId,
                        'user_id' => $item_user,
                        'sender_id' => $userId,
                        'content' => $msg,
                        'isread' => 1,
                    );
                    $updated_c = DB::table('zoolife_notification')->insert($blance);
                    if ($updated_c) {

                        $dr['status'] = 200;
                        $dr['error'] = false;
                        //             $dr['message'] = 'Comment has been posted.';
                        $dr['message'] = trans('messages.comment_posted');
                        // $dr['message'] = 'تمت اضافة تعليق';
                    }
                }
            }
        }
        return Response::json($dr);
    }
    public function delete_comment(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['message'] = 'Unable to process the request. Please try later.';
        $dr['message'] = trans('messages.unable_to_process_request');
        // $dr['message'] = 'عفوا تم ايقاف حسابك';
        $userId = $request->user_id;
        $itemId = $request->id;
        $commentId = $request->comment_id;
        $sql = DB::table('item_comments')->where('itemId', '=', $itemId)->where('userId', '=', $userId)->where('id', '=', $commentId)->delete();
        if ($sql) {
            $dr['status'] = 200;
            $dr['error'] = false;
            //             $dr['message'] = 'Comment has been deleted';
            $dr['message'] = trans('messages.comment_deleted');
            // $dr['message'] = 'تم حذف التعليق';
        }
        return Response::json($dr);
    }
    public function list_comments_by_item(Request $request)
    {
        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['data'] = [];
        $itemId = $request->id;
        $item = Item::find($request->id);
        
        if ($item)
        {
            $data = $item->itemComments;
            // dd($data);
            // $data = DB::table('item_comments')
            //     // ->join('item', 'users.id', '=', 'item_comments.userId')
            //     ->select('item_comments.id','item_comments.itemId','item_comments.userId','item_comments.message','item_comments.co as created_at', 'item_comments.uo as updated_at' )
            //     ->where('itemId', '=', $itemId)
            //     ->get();


            if (count($data) > 0) {
                $dr['status'] = 200;
                $dr['error'] = false;
                $dr['data'] = $data;
            }
        } else {
            $dr['message'] = 'invalid id';
        }
        return Response::json($dr);
    }
}
