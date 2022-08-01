<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Services\UserService;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //Show register form
    public function create()
    {
        return view('user.register');
    }

    //Create user
    public function store(Request $request,UserService $userService)
    {
        $formFields = $request->validate([
            'username' => ['required', 'min:4','max:50'],
            'password' => ['required','min:6'],
            'age' => 'numeric|min:18|max:85',
            'email' => ['required', 'email'],
            'gender' => 'required',
            'country' => ['required','min:5','max:50']
        ]);

        $user = $userService->create($formFields);

        return redirect('/')->with('message','User create and logged in');
    }

    //Show login form
    public function login()
    {
       return view('user.login');
    }

    //Login user
    public function authenticate(Request $request,UserService $userService)
    {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        
        if($userService->login($request,$formFields))
        {
            return redirect('/')->with('message','You are now logged in!');
        }

        return back()->withError(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    //Logout user
    public function logout(Request $request,UserService $userService)
    {
        $userService->logout($request);
        
        $request->session()->flash('message', 'You have been logged out!');

        return redirect('/');
    }

    //Edit user

    public function editPage()
    {
        $user = auth()->user();

        return view('user.edit' , ['user' => $user]);
    }

    public function storeEditUser(Request $request,UserService $userService,FileService $fileService)
    {
        $formFields = $request->validate([
            'age' => 'numeric|min:18|max:85',
            'email' => ['required', 'email'],
            'gender' => 'required',
            'country' => ['required','min:5','max:50']
        ]);

        $formFields['username'] = auth()->user()->username;

        $formFields['avatar'] = $fileService->storeFile($request,'avatar','avatars');
        
        $user = auth()->user();

        $user->update($formFields);

        //Logout user
        $userService->logout($request);
        
        return redirect('/')->with('message','User is updated.Please login again!');
    }
}
