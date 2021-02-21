<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestUserRequest;
use App\Models\User;
use App\Services\UserService;

// use Illuminate\Http\Request;



class AuthController extends Controller
{
    //

    protected $userService;

    public function __construct(UserService $userService){

        $this->userService=$userService;

    }

   
    public function register(RequestUserRequest $request)
    {

        $this->userService->registerUser($request->all());
        
    //
    $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password)
    ]);
$token=$user->createToken('youtubeTutorial')->accessToken;
return response()->json([
    'success'=>true,
    'user'=>$user,
    'token'=>$token
]);
    
    }
}
