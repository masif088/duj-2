<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FcmController extends Controller
{
    public function send($title = null, $body = null, $image = null, $token = null,$role = null,$gudang)
    {
        if ($token == null) {
            $token = User::where('token', '!=', null)->whereIn('role',[$role ?? 'ketua'])->whereIn('gudang_id',[$gudang])->get()->pluck('token')->toArray();
        }
        $msg = array(
            "title" => $title,
            "body" => $body,
            "image" => $image,
            "click_action" =>  "FLUTTER_NOTIFICATION_CLICK"
        );


        $server_key = "AAAAf6VSFko:APA91bEcdAo43wjhtQnFEoV9_aFaClT3gMQSqvXPW3m1QYpYj6cX1wpFrxMAT6Hqr6QlDTypqAuxQv-dnnR48oaRjgbIhXyimtTZcZTMPtDUY0TzWjx3tQFdOm-UMcfodZy-xdAYplvb";

        $headers = [
            'Authorization' => 'key=' . $server_key,
            'Content-Type'  => 'application/json',
        ];
        $fields = [
            'notification'  => $msg,
            "registration_ids" => $token,
        ];

        $fields = json_encode($fields);

        $client = new Client();
        try {
            $request = $client->post("https://fcm.googleapis.com/fcm/send", [
                'headers' => $headers,
                "body" => $fields,
            ]);
            $response = $request->getBody();
            return 'ok';
        } catch (Exception $e) {
            return 'error';
        }
    }
}
