<?php

namespace App\Contracts\Services\Auth;


interface AuthServiceInterface
{
  public function saveUser($request);

  public function loginUser($request);
}