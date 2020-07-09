<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index(){
        $users = User::paginate(10);
        return view('admin.users.index', ['users'=>$users]);
    }


    public function showProfile(User $user){  //inject user class
        return view('admin.users.profile',['user'=>$user]); //return user
    }

    public function updateProfile(User $user){  //inject user class

        $inputs =request()->validate([      // validates user input
            'username'=>['required', 'string', 'max:255', 'alpha_dash'],
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'profile_pic'=>['file'],
            'password'=>['min:6', 'max:255', 'confirmed']
        ]);

        if(request('profile-pic')){     //checks if user has selected a profile pic
            $inputs['profile_pic'] = request('profile-pic')->store('images');
        }


        $user->update($inputs);
        
        return back();

    }

    public function destroy(User $users){
        $posts = $users->posts();

        $users->delete();
        $posts->delete();
        Session::flash('deleted_message','User was deleted successfully.'); // saves a message in flash data for one time only
        return back();
    }
}
