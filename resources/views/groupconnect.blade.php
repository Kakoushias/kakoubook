@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Join the Group!</h3></header>
            <form action="{{route('group.join', ['group_id' => $group->id])}}" method="POST">
                <input type="hidden" value="{{$group->id}}" name="group_id">
                <hr>
                <article> {{$user->first_name}} are you sure you want to join the group <strong>{{$group->group_name}}</strong> ?</article>

                
            <button type="submit" class="btn btn-primary">Join!</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
            <hr>
            <h4>Users in this group</h4>
            <div>
                <ul class="list-group">
                    @foreach($users as $user)
                            <div class="user" data-postid="{{ $user->id}}">
                                <li class="list-group-item">
                                    <article> {{ $user->first_name }}</article>
                                </li>
                            </div>
                    @endforeach
                </ul>
            </div>
            
        </div>

    </section>
@endsection