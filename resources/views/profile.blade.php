@extends('layouts.master')

@section('content')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>{{ $user->first_name }}</h3></header>
            <hr>
            <div class="info">
                            User age:  <strong>{{ $user->settings->user_age}}</strong>.
            </div>
            <hr>
            <div class="info">
                            User age:  <strong>{{ $user->settings->gender}}</strong>.
            </div>
            
        </div>

@endsection