<?php

namespace App\Http\Controllers;

use App\User;
use App\Like;
use App\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groups = Group::orderBy('created_at', 'desc')->get();
        return view('group', ['user'=>Auth::user()], ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('groupcreate', ['user'=>Auth::user()] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user = Auth::user();

        $group = new Group();

        $group->group_name = $request['group_name'];
        $group->description = $request['description'];

        $group->creator()->associate($request['user_id']);
        $group->save();

        // $user->friends()->attach($request['user_id']);


        return redirect()->route('group.index');
    }

    public function getConnect($group_id){

        $group = Group::where('id', $group_id)->first();
        
        return view('groupconnect', ['user'=>Auth::user()], ['group' => $group]);

    }

    public function groupJoin($group_id)
    {
        $user = Auth::user();

       
        $user->groups()->attach($group_id);


        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}