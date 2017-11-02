@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Kakoubook Groups</h3></header>
            <hr>
            <div>
                <ul class="list-group">
                    @foreach($groups as $group)
                        
                            <div class="group" data-postid="{{ $group->id}}">
                                <li class="list-group-item">
                                    <a href="{{route('group.connect', ['group_id' => $group->id])}}" class="user">{{ $group->group_name }}</a>
                                    <hr>
                                    <article>Description: {{ $group->description }}</article>
                                </li>
                            </div>
                        

                    @endforeach
                </ul>
            </div>
            <hr>
            <a href="{{route('group.create')}}">Create your own Group!</a>

        </div>

@endsection