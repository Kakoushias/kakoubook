@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Friends</h3></header>
            @foreach($users as $user)
                <article class="user" data-postid="{{ $user->id}}">
                    <p>{{ $user->first_name }}</p>
                </article>
            @endforeach
        </div>

    </section>
@endsection