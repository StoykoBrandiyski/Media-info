<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface UserContract
{
    /**
     * @param $id
     * @return mixed
     */
    function getUserByID($id);

    /**
     * @param $fiels
     * @return mixed
     */
    function create($fiels);
  
    /**
     * @param $request
     * @param $fiels
     * @return bool
     */
    function login(Request $request,$fiels);
    
    /**
     * @param $request
     */
    function logout(Request $request);
    
}
