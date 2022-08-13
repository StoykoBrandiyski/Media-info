<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface IUserService 
{
    function getUserByID($id);

    function create($fiels);
  
    function login(Request $request,$fiels);
    
    function logout(Request $request);
    
}
