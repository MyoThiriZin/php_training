<?php

namespace App\Dao\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Dao\Auth\ForgetPasswordDaoInterface;

class ForgetPasswordDao implements ForgetPasswordDaoInterface
{
  public function saveForgetPassword($request)
  {
    $token = Str::random(64);
    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
    ]);
    Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
      $message->to($request->email);
      $message->subject('Reset Password');
    });
  }

  public function saveResetPassword($request)
  {
    $updatePassword = DB::table('password_resets')
    ->where([
        'email' => $request->email,
        'token' => $request->token
    ])
    ->first();

    if (!$updatePassword) {
        return back()->withInput()->with('error', 'Invalid token!');
    }

    $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email' => $request->email])->delete();
  }
}
