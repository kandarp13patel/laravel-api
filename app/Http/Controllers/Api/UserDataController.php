<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserDataController extends Controller
{
    public function getUserData(Request $request)
    {
        $mainData =array();
        $data = [];

   
        $data['user'] = User::where(['api_token' => Str::after($request->header('Authorization'), 'Bearer ') ])->first();

        $data['posts'] = Post::all();

        array_push($mainData, $data);
        return response()->json([
            'status' => 'success','infoData' => $mainData
        ],200);
    }
}
