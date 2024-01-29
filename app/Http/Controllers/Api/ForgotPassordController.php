<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ForgotPassordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(128);
        $code = Str::random(6);
        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {
            try {
               
                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'code' => $code,
                    'created_at' => now()
                ]);

                
                $fromAddress = env('MAIL_FROM_ADDRESS', 'testpatel031@gmail.com');

                // Send email
                Mail::send('mail.forgotpassword', ['token' => $token, 'code' => $code], function ($message) use ($user, $fromAddress) {
                    $message->from($fromAddress);
                    $message->to($user->email);
                    $message->subject('Reset Password');
                });

                return response()->json([
                    'message' => 'We have sent you a code to reset your password, please check your email.',
                    'status' => 'success',
                ],200);
            } catch (\Exception $e) {
                
                Log::error($e);

                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => 'error',
                ], 500);
            }
        } else {
            return response()->json([
                'message' => 'Email address not found',
                'status' => 'error',
            ], 400);
        }
    }
}
