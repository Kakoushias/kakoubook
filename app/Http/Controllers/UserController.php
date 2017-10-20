<?php

namespace App\Http\Controllers;


use App\User;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->route('dashboard');
        }
        return redirect()->back();

    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount(){
        return view('account', ['user'=>Auth::user()]);
    }

    public function getFriends(){
        $users = User::orderBy('created_at', 'desc')->get();
        return view('friends', ['user'=>Auth::user()], ['users' => $users]);
    }

    public function makeFriends($user_id){

        $user = Auth::user();
        $friend= User::find('id', $user_id);

        $friends = new User;
        $friends->friends('user_id'=>$user->('id'), 'friend_id'=>$friend->('id') );
        $friends->save;



    }


    public function getConnect($user_id){
        $user = User::where('id', $user_id)->first();

        return view('connect',['user'=>$user] );

    }



    public function getUsers(){
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users', ['user'=>Auth::user()], ['users' => $users]);
    }



    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'first_name'=> 'required|max:120'
        ]);

        $user= Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name']. '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}