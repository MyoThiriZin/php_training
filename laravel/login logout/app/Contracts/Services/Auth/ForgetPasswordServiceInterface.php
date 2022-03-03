<?php

namespace App\Contracts\Services\Auth;


interface ForgetPasswordServiceInterface
{
  public function saveForgetPassword($request);

  public function saveResetPassword($request);
}