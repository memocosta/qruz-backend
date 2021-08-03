<?php

namespace App\Helpers;

class Firebase
{
    public static function push ($token, $title, $message, $data = false)
    {
        #API access key from Google API's Console
        $API_ACCESS_KEY = 'AAAAWe3pgOY:APA91bGvj5Sg0KWBWh0dnh9zBU860LkMUtsOW72g9iRCejlfpNsrk5A0oXhvwgS6BUWgsND9DU4lK468kvbuTaexSdA0C9dCRh83ughg8Pa_m6Ka1JaopVpGxrsU_r_f65BMTjPpceGp';
        
        #prep the bundle
        if ( $data == false ) {
            $fields = [
                'to' => $token,
                'notification' => [
                    'title' => $title,
                    'body' => $message,
                    'vibrate'   => 1,
                    'sound'     => "default"
                ],
                "priority" => "high",
                'alert' => $message,
                'title' => $title
            ];
        } else {
            $fields = [
                'to' => $token,
                'notification' => [
                    'title' => $title,
                    'body' => $message ,
                    'vibrate'   => 1,
                    'sound'     => "default"
                ],
                "priority" => "high",
                'alert' => $message,
                'title' => $title,
                'data' => $data
            ];
        }

        $headers = [
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        ];

        #Send Reponse To FireBase Server	
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    }
}