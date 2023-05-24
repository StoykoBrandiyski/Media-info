<?php
namespace App\Http\Controllers;

use App\Contracts\MovieContract;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Contracts\UserContract;
use App\Exceptions\UserAlreadyExistException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    private UserContract $userRepository;
    private MovieContract $movieRepository;

    public function __construct(
        UserContract $userRepository,
        MovieContract $movieRepository)
    {
        $this->userRepository = $userRepository;
        $this->movieRepository = $movieRepository;
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

        try {
            $this->userRepository->create($formFields);
            $this->userRepository->login($request,$formFields);
        } catch (UserAlreadyExistException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
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

        
        if($this->userRepository->login($request,$formFields))
        {
            return redirect('/')->with('message','You are now logged in!');
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])
                     ->onlyInput('username');
    }

    //Logout user
    public function logout(Request $request)
    {
        $this->userRepository->logout($request);

        $request->session()->flash('message', 'You have been logged out!');

        return redirect('/');
    }

    //Edit user

    public function editPage()
    {
        $user = auth()->user();

        if (!$user){
            return redirect('/')->withErrors(['error' => 'Invalid user!']);
        }
        $userId = $user->id;
        $userMovies = $this->movieRepository->getMoviesByUserId($userId);
       
        $countUserMovies = $this->movieRepository
                               ->countMoviesByUserId($userId);
        
        return view('user.edit' , 
                   ['user' => $user,
                   'countUserMovies' => $countUserMovies,
                   'userMovies' => $userMovies
                   ]);
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
        //$this->userRepository->logout($request);
        
        return redirect('/')->with('message','User is updated.');
    }
}
