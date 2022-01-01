<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Validator;
use Image;
use DB;
use phpDocumentor\Reflection\Types\Null_;

class ChatController extends Controller
{
    public function get_chat_list_by_user(Request $request)
    {

        $dr['status'] = 100;
        $dr['error'] = true;
        $dr['data'] = [];
        $dr['message'] = 'Unable to process the request. Please try later.';
        $user_id = $request->user_id;
        $res = DB::table('users')->select('*')->where('id', '=', $user_id)->where('verify', '=', 1)->get();
        if (count($res) > 0) {
            $id = $res[0]->id;
            $messages = [];
            $chat_data = DB::table('messages')->select('*')->where('fromUserId', '=', $id)->where('chatId', '!=', Null)->where('removeAt', '=', 0)->get()->groupBy('chatId');
            foreach ($chat_data as $chat) {
                $fromUserId = $chat[0]->fromUserId;
                $toUserId = $chat[0]->toUserId;
                $chat->from_user = DB::table('users')->select('username', 'id')->where('id', '=', $fromUserId)->where('verify', '=', 1)->get();
                $chat->to_user = DB::table('users')->select('username', 'id')->where('id', '=', $toUserId)->get();
                $messages[] = $chat;
            }
            $dr['status'] = 200;
            $dr['data'] = $messages;
            $dr['error'] = false;
            $dr['message'] = 'User Chat data.';
        }
        return Response::json($dr);
    }
    public function get_single_chat_by_user(Request $request)
    {

        $dr['status'] = 100;
        $dr['error'] = true;
        $dr['data'] = [];
        $dr['message'] = trans('messages.unable_to_process_request');

        $user_id = $request->user_id;
        $chat_id = $request->chat_id;
        $res = DB::table('users')->select('*')->where('id', '=', $user_id)->where('verify', '=', 1)->get();
        if (count($res) > 0) {
            $id = $res[0]->id;
            $messages = [];
            $chat_data = DB::table('messages')->select('*')->where('fromUserId', '=', $id)->where('chatId', '=', $chat_id)->where('removeAt', '=', 0)->get();
            foreach ($chat_data as $chat) {
                $fromUserId = $chat->fromUserId;
                $toUserId = $chat->toUserId;
                $chat->from_user = DB::table('users')->select('username', 'id')->where('id', '=', $fromUserId)->where('verify', '=', 1)->get();
                $chat->to_user = DB::table('users')->select('username', 'id')->where('id', '=', $toUserId)->get();
                $messages[] = $chat;
            }
            $dr['status'] = 200;
            $dr['data'] = $messages;
            $dr['error'] = false;
            $dr['message'] = 'User Chat data.';
        }
        return Response::json($dr);
    }
    public function send_message(Request $request)
    {

        $dr['status'] = 100;
        $dr['error'] = true;
        // $dr['message'] = 'Unable to process request. Please check your username and try again.';
        $dr['message'] = trans('chats.unable_to_process_request');
        $where = '';
        $user_id = $request->user_id;
        $res = DB::table('users')->select('*')->where('id', '=', $user_id)->where('verify', '=', 1)->get();
        $id = $res[0]->id;
        $blance = array(
            'fromUserId' => $id,
            'msgType' => 0,
            'chatId' => $request->chat_id,
            'message' =>  $request->message,
            'toUserId' => $request->to_user_id,
            'createAt' => time()
        );
        if (count($res) > 0) {
            $id = DB::table('messages')->insert($blance);
            if ($id) {
                $dr['status'] = 200;
                $dr['error'] = false;
                $dr['message'] = trans('chats.message_sent');
                // $dr['message'] = 'Message Sent.';
            } else {
                $dr['status'] = 200;
                $dr['error'] = false;
                $dr['message'] = trans('chats.message_failed');
                // $dr['message'] = 'Unable to send message, Please try later.';
            }
        }
        return Response::json($dr);
    }
    public function send_new_message(Request $request)
    {

        $dr['status'] = 100;
        $dr['error'] = true;
        $dr['message'] = 'Unable to process request. Please check your username and try again.';
        $where = '';
        $user_id = $request->user_id;
        $res = DB::table('users')->select('*')->where('id', '=', $user_id)->where('verify', '=', 1)->get();
        $id = $res[0]->id;
        $blance = array(
            'fromUserId' => $id,
            'msgType' => 0,
            'chatId' => $request->chatId,
            'message' =>  $request->message,
            'toUserId' => $request->to_user_id,
            'createAt' => time()
        );
        if (count($res) > 0) {
            $lastChatId = DB::table('messages')->select('chatId')->orderBy('chatId', 'DESC')->limit(1)->get();
            $chat_id = $lastChatId[0]->chatId + 1;
            $id = DB::table('messages')->insert($blance);
            if ($id) {
                $dr['status'] = 200;
                $dr['error'] = false;
                $dr['message'] = trans('chats.message_sent');
                // $dr['message'] = 'Message Sent.';
            } else {
                $dr['status'] = 100;
                $dr['error'] = true;
                $dr['message'] = trans('chats.message_failed');
                // $dr['message'] = 'Unable to send message, Please try later.';
            }
        }
        return Response::json($dr);
    }
    public function delete_message(Request $request)
    {

        $dr['status'] = 100;
        $dr['error'] = true;
        $dr['message'] = 'Unable to process request. Please check your username and try again.';
        $where = '';
        $user_id = $request->user_id;
        $chatId = $request->chat_id;
        $message_id = $request->message_id;
        $res = DB::table('users')->select('*')->where('id', '=', $user_id)->where('verify', '=', 1)->get();
        if (count($res) > 0) {
            $id = $res[0]->id;
            $removeAt = time();
            $blance = array(
                'removeAt' => $removeAt,
            );
            $item = DB::table('messages')->where('fromUserId', '=', $id)->where('chatId', '=', $chatId)->where('id', '=', $message_id)->delete();
            if ($item) {
                $dr['status'] = 200;
                $dr['error'] = false;
                // $dr['message'] = 'Message deleted succefully.';
                $dr['message'] = trans('chats.message_deleted');
            } else {
                $dr['status'] = 100;
                $dr['error'] = true;
                $dr['message'] = trans('chats.message_delete_failed');
            }
        }
        return Response::json($dr);
    }
}
