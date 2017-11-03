@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class=""row new="post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>

        </div>

    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id}}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }}, <strong>{{ $post->created_at->diffForHumans() }}</strong>.
                    </div>
                    <div class="interaction">
                        <a href="#" class="like">{{Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1
                        ? 'You like this post' : 'Like' : 'Like' }}</a>  |
                        <a href="#" class="like">{{Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0
                        ? 'You don\'tlike this post' : 'Dislike' : 'Dislike' }}</a>

                        @if(Auth::user() == $post->user)
                            |
                        <a href="#" class="edit">Edit</a> |
                        <a href="{{route('post.delete', ['post_id' => $post->id])}}">Delete</a>
                        @endif
                    </div>
                    <div>
                        @include('includes.message-block')
                        <section class=""row new="comment">
                            <div class="form-group">
                                <header><h3>Your opinion?</h3></header>
                                <form action="{{ route('comment.store') }}" method="POST">
                                    <div class="form-group">
                                        <textarea class="form-control" value="" name="body" id="new-post" rows="3" placeholder="Your Comment"></textarea>
                                    </div>
                                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                                    <input type="hidden" value="{{$post['id']}}" name="post_id">

                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                    <input type="hidden" value="{{Session::token()}}" name="_token">
                                </form>

                            </div>

                        </section>
                    </div>
                    <section class="row posts">
                        <div class="form-group">
                            <header><h4>Comments about this Post...</h4></header>
                            <hr>
                            @foreach($comments as $comment)
                                @if($post->id == $comment['post_id'])
                                <article class="comment" data-postid="{{ $comment->id}}">
                                    <p>{{ $comment->body }}</p>
                                    <div class="info">
                                        Posted by {{ $comment->user->first_name }}, <strong>{{ $comment->created_at->diffForHumans() }}</strong>.
                                    </div>
                                    <!-- <div class="interaction">
                                        <a href="#" class="like">{{Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1
                        ? 'You like this post' : 'Like' : 'Like' }}</a>  |
                                        <a href="#" class="like">{{Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0
                        ? 'You don\'tlike this post' : 'Dislike' : 'Dislike' }}</a>
 -->
                                        <!-- @if(Auth::user() == $comment->user)
                                            |
                                            <a href="#" class="edit">Edit</a> |
                                            <a href="{{route('post.delete', ['post_id' => $post->id])}}">Delete</a>
                                        @endif -->
                                    </div>
                                </article>
                                <hr>
                                @endif
                            @endforeach
                        </div>
                    </section>
                </article>
                <hr>
            @endforeach
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        var token = '{{Session::token()}}';
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';

    </script>

@endsection