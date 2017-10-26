@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Make Friends!</h3></header>
            <form action="{{route('make.friends')}}" method="POST">
                <input type="hidden" value="{{$user->id}}" name="user_id">
                <input type="text" value="" name="msg" placeholder="Say hi!" required>
                <input type="number" value="" name="age" min="{{$user->settings['min_age']?? 15}}" max="{{$user->settings['max_age']?? 100}}" placeholder="your age" required>


            <button type="submit" class="btn btn-primary">Connect!</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>

    </section>
@endsection