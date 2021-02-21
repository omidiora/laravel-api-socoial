<?php

namespace App\Services;


class UserService

{

    public function registerUser(array $data)
    {
        
       $userData=[
           'name'=>$data['name'],
           'email'=>$data['email'],
           'password'=>bcrpyt['password'],
       ];
       dd($userData);
    }



}













?>