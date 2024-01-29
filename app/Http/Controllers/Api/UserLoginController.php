<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB, Mail, Auth;
use App\Models\User;


class UserLoginController extends Controller
{
    function userlogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ], [
            'password.min' => 'Login info is incorrect.',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $user = User::select('name', 'email', 'id', 'password', 'api_token AS token')->where('email', $request->email)->first();

        if (empty($user)) {
            return response()->json(['message' => 'Login Failed!! Please, check your credentials'], 400);
        }

     
         if (Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login successfully', 'data' => $user], 200);
        } else {
            return response()->json(['message' => 'Login Failed!! Please, check your credentials'], 400);
        }
    }
}
