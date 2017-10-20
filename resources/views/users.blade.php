@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="user">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Kakoubook Users</h3></header>
            @foreach($users as $user)
                <div class="user" data-postid="{{ $user->id}}">
                    <a href="{{route('connect.users', ['user_id' => $user->id])}}" class="user">{{ $user->first_name }}</a>
                </div>
            @endforeach
        </div>

    </section>
    {{--<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title">Make Friends!</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p>Become friends with {{ $user->first_name }}?</p>--}}

                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary" id="modal-connect">Connect</button>--}}
                {{--</div>--}}
            {{--</div><!-- /.modal-content -->--}}
        {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}
    {{--<script>--}}
        {{--var token = '{{Session::token()}}';--}}
        {{--var url = '{{ route('make.friends') }}';--}}

    </script>
@endsection