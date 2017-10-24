@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Friends</h3></header>
            @foreach($friends as $friend)
                <article class="friend" data-postid="{{ $friend->id}}">
                    <p>{{ $friend->first_name }}</p>
                </article>
            @endforeach
        </div>

    </section>
@endsection