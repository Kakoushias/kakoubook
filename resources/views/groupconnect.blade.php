@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Join the Group!</h3></header>
            <form action="{{route('group.join', ['group_id' => $group->id])}}" method="POST">
                <input type="hidden" value="{{$group->id}}" name="group_id">
                <hr>
                <article>Are you sure you want to join the group <strong>{{$group->group_name}}</strong> ?</article>
                


            <button type="submit" class="btn btn-primary">Join!</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>

    </section>
@endsection