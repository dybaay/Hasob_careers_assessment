<?php

namespace App\Http\Controllers;

use App\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    public function showAllUsers() {
        return User::all();
    }


    public function register(StoreUserRequest $request)
    {
       Hash::make($request->password);
       $user = User::create($request->all());

        event(new Registered($user));

        return response()->json("User created successfully!");

    }

    public function showUser(User $user) {
        return $user;
    }

    public function updateProfile(Request $request, User $user) {

        $user->update($request->all());
        return $user;
    }

    public function deleteAccount(User $user) {

        $user->delete();
        return response()->json("Your account has been deleted successfully!");
    }
}
