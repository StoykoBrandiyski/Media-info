<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService {

    public function getUserByID($id)
    {
        $user = User::where('id',$id)->get();

        if($user == null){
            return new User();
        }

        return $user;
    }

    public function create($fiels)
    {
        if(empty($fiels))
        {

        }

        $fiels['password'] = bcrypt($fiels['password']);

        $user = User::create($fiels);

        return $user;
    }

   
    public function login(Request $request,$fiels)
    {
        if(auth()->attempt($fiels)){
            $request->session()->regenerate();

            return true;
        }

        return false;
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

}