@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Friends</h3></header>
            <hr>
            <ul class="list-group">
                @foreach($friends as $friend)
                    <li class="list-group-item">
                        <article class="friend" data-postid="{{ $friend->id}}">
                            <p><strong>{{ $friend->first_name }}</strong></p>
                        </article>
                        <div class="info">
                            Became friends at  <strong>{{ $friend->created_at}}</strong>.
                        </div>
                    </li>
                @endforeach

            </ul>

        </div>

    </section>
@endsection