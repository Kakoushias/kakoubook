@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Kakoubook Users</h3></header>
            <hr>
            <div>
                <ul class="list-group">
                    @foreach($users as $user)
                        @if($user != Auth::user())
                            <div class="user" data-postid="{{ $user->id}}">
                                <li class="list-group-item">
                                    <a href="{{route('connect.users', ['user_id' => $user->id])}}" class="user">{{ $user->first_name }}</a>
                                </li>
                            </div>
                        @endif

                    @endforeach
                </ul>


            </div>

        </div>

@endsection