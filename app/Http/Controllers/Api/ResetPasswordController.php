<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;





class ResetPasswordController extends Controller
{
    public function resetpassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
            'code' => 'required|string|min:6',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error',
            ], 400);
        }

        $newPassword = DB::table('password_resets')->where(['token' => $request->token])->first();

        if (empty($newPassword)) {
            return response()->json([
                'message' => 'Invalid URL',
                'status' => 'error',
            ], 200);
        }

        if (time() - strtotime($newPassword->created_at) >= 86400) {
            return response()->json([
                'message' => 'Link has expired',
                'status' => 'error',
            ], 400);
        }

        if ($request->code != $newPassword->code) {
            return response()->json([
                'message' => 'Invalid Reset Code! Please check your email.',
                'status' => 'error',
            ], 400);
        }

        $user = User::where('email', $newPassword->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid token!',
                'status' => 'error',
            ], 400);
        }

        $user->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
         
        return response()->json([
            'message' => 'Your Password has been changed',
            'status' => 'success',
        ], 200);
    }
}
