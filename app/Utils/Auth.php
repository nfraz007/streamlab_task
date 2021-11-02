<?php

namespace App\Utils;

use Exception;
use App\Utils\Common;
use App\Services\HomeService;

class Auth
{
    public static function token() {
        return session()->get("token");
    }

    public static function is_login() {
        $token = session()->get("token");
        if (!isset($token) || is_null($token)) {
            throw new Exception("Token not provided.");
        }

        $token_decode = Common::jwt_decode($token, env('JWT_KEY'), ['HS256']);
        if(!$token_decode) {
            throw new Exception("Invalid Token.");
        }
        $user_id = $token_decode->sub;

        // before this check for every expiry token and delete this
        $user_token = HomeService::get_token_by_user_id($user_id);
        if ($user_token && $user_token == $token) {
            return true;
        } else {
            throw new Exception("Invalid Token.");
        }
    }
}