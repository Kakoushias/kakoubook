@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Account Settings</h3>
            <hr>
            <form action="{{route('settings.store')}}" method="POST" class="navbar-form navbar-left" role="search">
                <div class="col-md-6">
                    <div class="form-group">
                        <lablel for="min_age">
                            Minimum Social Connections Age
                        </lablel>
                        <input type="number" value="{{$settings['min_age']??''}}" name="min_age" class="form-control" placeholder="minimum age" min="18" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <lablel for="max_age">
                            Maximum Social Connections Age
                        </lablel>
                        <input type="number" value="{{$settings['max_age']??''}}" name="max_age" class="form-control" placeholder="maximum age" max="30" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <lablel for="user_age">
                            My age
                        </lablel>
                        <input type="number" value="{{$settings['user_age']??''}}" name="user_age" class="form-control" placeholder="your age" min="15" max="90" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <lablel for="gender">
                            My gender
                        </lablel>
                        <div class="form-group">
                            <input type="radio" name="gender" value="{{$settings['gender']??'male'}}" class="form-control" required> Male<br>
                            <input type="radio" name="gender" value="{{$settings['gender']??'female'}}" class="form-control" required> Female<br>
                            <input type="radio" name="gender" value="{{$settings['gender']??'other'}}" class="form-control" required> Other
                        </div>
                    </div>
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    {!! csrf_field() !!}
                </div>

                    <button type="submit" class="btn btn-default">Submit</button>


            </form>
        </div>

    </section>
@endsection