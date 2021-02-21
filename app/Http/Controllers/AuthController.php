<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestUserRequest;

// use Illuminate\Http\Request;


class AuthController extends Controller
{
    //
   
    public function register(RequestUserRequest $request)
    {
    //
    $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcypt($request->password)
    ]);
$token=$user->createToken('youtubeTutorial')->successToken;
return $token;
    
    }
}
