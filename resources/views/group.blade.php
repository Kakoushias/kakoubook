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
                                    <article>Creator: {{ $group->creator()->first()->first_name }}</article>
                                
                                    @if($group->creator == Auth::user())

                                    <!-- <a href="">Edit Group</a>|
                                    <a href="{{route('group.destroy', ['group_id' => $group->id])}}">Delete Group</a> -->
                                    
                                    <form action="{{ route('group.destroy' , ['group_id' => $group->id])}}" method="POST">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <hr>

                                        <div class="modal-footer no-border">
                            
                                        <button type="submit" class="btn btn-primary">Delete Group</button>
                                        </div>
                                    </form>
                            
                                    @endif
                                    


                                </li>
                            </div>
                            
                        

                    @endforeach
                </ul>
            </div>
            <hr>
            <a href="{{route('group.create')}}"><strong>Create your own Group!</strong></a>
            <hr>

        </div>

@endsection