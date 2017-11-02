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

//        $user_id = $request['user_id'];
//
//        User::where('id', '=', $user_id)->update([
//            'first_name' => $request['first_name']
//        ]);

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
        $friends = Auth::user()->friends()->orderBy('created_at', 'desc')->get();
        return view('friends', ['user'=>Auth::user()], ['friends' => $friends]);
    }

    public function getProfile($user_id){

        $user = User::where('id', $user_id)->first();
        //$settings = $user()->settings()->get();
        //dd([$settings]);
        //['settings'=> $user->settings]
        return view('profile', ['user'=>$user]);
    }



    public function makeFriends(Request $request){


        $user = Auth::user();

        $user->friends()->attach($request['user_id']);


        return redirect()->route('users');

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