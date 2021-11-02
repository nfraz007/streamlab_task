<?php

namespace App\Utils;

use Firebase\JWT\JWT;

class Common
{
    public static function now(){
        return date(config("constant.datetime"));
    }

    public static function object_to_array($object){
        $array = json_decode(json_encode($object), true);
        return $array;
    }

    // jwt encode class, please dont mess with this
    public static function jwt_encode($user_id = "") {
        $payload = [
            'iss' => "laravel_jwt_token", // Issuer of the token
            'sub' => $user_id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60*24 // Expiration time in sec, 24 hours
        ];

        // As you can see we are passing `JWT_KEY` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_KEY'));
    }

    // please dont mess with this also
    public static function jwt_decode($token = ""){
        return JWT::decode($token, env('JWT_KEY'), ['HS256']);
    }

    public static function asset_url($url = ""){
        return env("ASSET_URL").$url;
    }
}