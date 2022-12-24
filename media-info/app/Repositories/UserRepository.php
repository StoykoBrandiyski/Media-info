<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\UserContract;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository extends BaseRepository implements UserContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getUserByID($id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $ex) {
            throw new ModelNotFoundException($ex);
        }
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