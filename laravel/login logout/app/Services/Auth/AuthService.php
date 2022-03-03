<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;


class AuthService implements AuthServiceInterface
{

  private $authDao;

  public function __construct(AuthDaoInterface $authDao)
  {
    $this->authDao = $authDao;
  }

  public function saveUser($request)
  {
    return $this->authDao->saveUser($request);
  }

  public function loginUser($request){
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      return redirect()->intended('/')
                    ->withSuccess('You have Successfully loggedin');
    }else{
      return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
  }
}
