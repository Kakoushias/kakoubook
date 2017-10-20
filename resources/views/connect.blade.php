@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Make Friends!</h3></header>
            <div>
                <p>Would you like to connect to {{$user->first_name }}?</p>
            </div>

            <button type="submit" class="btn btn-primary" formaction="make.friends">Connect!</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </div>

    </section>
@endsection