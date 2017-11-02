@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Create Group!</h3></header>
            <form action="{{route('group.store')}}" method="POST">
                <input type="hidden" value="{{$user->id}}" name="user_id">
                <input type="text" value="" name="group_name" placeholder="Group name" required>
                <input type="text" value="" name="description" placeholder="description" required>
                


            <button type="submit" class="btn btn-primary">Connect!</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>

    </section>
@endsection