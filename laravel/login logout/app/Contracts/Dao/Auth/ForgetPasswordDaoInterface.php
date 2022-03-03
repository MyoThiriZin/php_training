<?php

namespace App\Contracts\Dao\Auth;



interface ForgetPasswordDaoInterface
{
  public function saveForgetPassword($request);

  public function saveResetPassword($request);
}
