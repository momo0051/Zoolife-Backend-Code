<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @Purpose Biding Model - That Manage Saving Bid & getting details from Bidding table.
 */
class BiddingModel extends Model
{
    protected $table = 'bidding';


    /**
     * @Purpose Get bid by ID
     * @param $item
     * @return mixed
     */
    public static function getBidById($item)
    {
        return BiddingModel::find($item);
    }

    /**
     * @purpose Add new Bid
     * @param Request $request
     * @return bool
     */
    public static function addBidding(Request $request): bool
    {
        $B = new BiddingModel();
        $B->bid_amount = $request->amount;
        $B->bid_by_user_id = $request->fromUserId;
        $B->item_id = $request->item_id;
        $IsSaved = $B->save();
        if ($IsSaved) {
            ## if new bid has saved then send push notification to all users that are involved in it.
            self::sendPushNotificationToBiddingUsers($B->item_id);
        }
        return $IsSaved;
    }

    /**
     * @Purpose get Bid on base of User and Post
     * @param $itemId
     * @param $bidById
     * @return mixed
     */
    public static function getBidOnBaseOfUserAndPost($itemId, $bidById)
    {
        return BiddingModel::where('item_id', $itemId)->where('bid_by_user_id', $bidById)->first();
    }

    /**
     * @Purpose Get Bidding Object
     * @param $itemId
     * @return mixed
     */
    private function getBidOnBaseOfPostObject($itemId)
    {
        return BiddingModel::where('item_id', $itemId)
            ->select('bidding.id as id', 'bidding.created_at as created_at', 'bid_amount', 'is_winner', 'username', 'email', 'phone', 'device_token', 'auction_expiry_time', 'phone', 'email', 'users.device_token')
            ->leftJoin('users', 'bidding.bid_by_user_id', '=', 'users.id')
            ->leftJoin('items', 'bidding.item_id', '=', 'items.id');
    }

    /**
     * @purpose Get Bids on base of Post
     * @param $itemId
     * @return mixed
     */
    public static function getBidOnBaseOfPost($itemId)
    {
        $This = (new self());
        return $This->getBidOnBaseOfPostObject($itemId)->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @Purpose Get user relation on POST
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'bid_by_user_id', 'id');
    }

    /**
     * @Purpose get Post related to Bids.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    /**
     * @Purpose send push notification
     * @param $ItemId
     */
    public static function sendPushNotificationToBiddingUsers($ItemId)
    {
        $This = (new self());
        ## collect all user those are involved in the Bidding
        $allBiding = $This->getBidOnBaseOfPostObject($ItemId)->whereNotNull('users.device_token')->pluck('users.device_token')->toArray();
        ## collect user that publish item for bidding.

        $Post = Item::find($ItemId);
        if ($Post instanceof Item) {
            $BidDidBy = User::find($Post->fromUserId);
            if ($BidDidBy instanceof User) {
                array_push($allBiding, $BidDidBy->device_token);
            }

            $ch = curl_init("https://fcm.googleapis.com/fcm/send");
            $title = "اشعار";
            $body = "لديك مزايدة جديدة";
            $notification = array('title' => $title, 'body' => $body, 'badge' => 1, 'data' => ['post_id' => $ItemId]);
            $arrayToSend = array('registration_ids' => $allBiding, 'notification' => $notification, 'data' => $notification);
            $json = json_encode($arrayToSend);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key= AAAAarKgHyI:APA91bEucI6EaFo6UlFyLM7YMqdS1xiXVZYlX7ReH7wDQDUHhDx7NCmcnBu7ti3fDTzrk0TjfQ1Zo0wQyk_fgGBd3DOJ7CFM8VqanY1j6nNAXiFMzjvtjhAH3LWavPAovNMXY9c6z5X7';
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_exec($ch);
            curl_close($ch);
        }
    }

}
