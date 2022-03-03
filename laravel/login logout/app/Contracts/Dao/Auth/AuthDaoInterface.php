<?php

namespace App\Contracts\Dao\Auth;



interface AuthDaoInterface
{
  public function saveUser($request);
}
