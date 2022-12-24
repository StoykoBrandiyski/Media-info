<?php
namespace App\Http\Controllers;

use App\Contracts\UserContract;
use Illuminate\Http\Request;
use App\Services\FileService;


class UserController extends Controller
{
    private $userRepostory;

    public function __construct(UserContract $userRepostory)
    {
        $this->userRepostory = $userRepostory;
    }

    //Show register form
    public function create()
    {
        return view('user.register');
    }

    //Create user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required', 'min:4','max:50'],
            'password' => ['required','min:6'],
            'age' => 'numeric|min:18|max:85',
            'email' => ['required', 'email'],
            'gender' => 'required',
            'country' => ['required','min:5','max:50']
        ]);

        $user = $this->userRepository->create($formFields);
        return redirect('/')->with('message','User create and logged in');
    }

    //Show login form
    public function login()
    {
       return view('user.login');
    }

    //Login user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        
        if($this->userRepostory->login($request,$formFields))
        {
            return redirect('/')->with('message','You are now logged in!');
        }

        return back()->withError(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    //Logout user
    public function logout(Request $request)
    {
        $this->userRepostory->logout($request);

        $request->session()->flash('message', 'You have been logged out!');

        return redirect('/');
    }

    //Edit user

    public function editPage()
    {
        $user = auth()->user();

        return view('user.edit' , ['user' => $user]);
    }

    public function storeEditUser(Request $request,FileService $fileService)
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
        $this->userRepostory->logout($request);
        
        return redirect('/')->with('message','User is updated.Please login again!');
    }
}
