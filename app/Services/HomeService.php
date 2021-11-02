<?php

namespace App\Services;

use App\Models\UserModel;

interface HomeInterface
{
    public static function get_token_by_user_id($user_id);
    public static function update_user_token($user_id, $token);
}

class HomeService implements HomeInterface
{
    public static function get_token_by_user_id($user_id){
        $user = UserModel::where("id", $user_id)->first();
        
        return $user && $user->token ? $user->token : "";
    }

    public static function update_user_token($user_id, $token){
		$user = UserModel::find($user_id);
        $user->token = $token;
        $user->save();
    }
}