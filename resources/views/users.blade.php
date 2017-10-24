@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Kakoubook Users</h3></header>
            @foreach($users as $user)
                @if($user != Auth::user())
                    <div class="user" data-postid="{{ $user->id}}">

                        <a href="{{route('connect.users', ['user_id' => $user->id])}}" class="user">{{ $user->first_name }}</a>
                    </div>
                @endif

            @endforeach
        </div>

@endsection