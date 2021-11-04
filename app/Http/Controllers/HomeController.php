<?php

namespace App\Http\Controllers;

use App\Utils\Auth;
use App\Utils\Common;
use App\Models\UserModel;
use App\Models\StreamModel;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function dashboard(Request $request) {
        $data = [];
        $streams = StreamModel::all();

        $data["stream_per_game"] = $streams->groupBy("game_name")->map->count();
        $data["highest_viewer_per_game"] = $streams->groupBy("game_name")->map->max("viewer_count");
        $data["median_viewer_per_game"] = $streams->groupBy("game_name")->map->median("viewer_count");
        $data["odd_streams"] = $streams->filter(function($v) {
            return $v->viewer_count % 2 == 1;
        })->values();
        $data["even_streams"] = $streams->filter(function($v) {
            return $v->viewer_count % 2 == 0;
        })->values();
        $data["top_100_streams"] = $streams->sortByDesc("viewer_count")->take(100)->values();
        $data["stream_same_viewer"] = $streams->filter(function($v) {
            return $v->viewer_count == $v->viewer_count;
        })->values();

        // echo json_encode($data);die;
        return view('dashboard', $data);
    }

    public function login(Request $request) {
        return view('login');
    }

    public function login_twitch(Request $request) {
        return Socialite::driver('twitch')->redirect();
    }

    public function login_twitch_callback(Request $request) {
        $data = Socialite::driver('twitch')->user();
        if($data) {
            $user = UserModel::firstOrCreate([
                "email" => $data->email
            ], [
                "name" => $data->nickname
            ]);
            $token = Common::jwt_encode($user->id);
            $user->token = $token;
            $user->save();

            session()->put("token", $token);

            return redirect()->route('dashboard');
        } else {
            return redirect()->route("login");
        }
    }

    public function logout(Request $request) {
        session()->flush();

        return redirect()->route('login');
    }
}
