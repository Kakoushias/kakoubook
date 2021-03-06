<?php


namespace App\Http\Controllers;

use App\Post;
use App\Comment;

use App\Like;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts], ['comments' => $comments]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        if($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        };
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }

    public function postLikePost(Request $request)
    {
        $post_id= $request['postId'];
        $is_like= $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        //checking IF i already have an entry else creating a new entry
        if($like){
            //checking boolean if its like or dislike
            $already_like = $like->like;
            //already got entry so setting update to true
            $update = true;
            //to undo if i press like and its already liked i delete entry
            if ($already_like == $is_like){
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();

        }
        //either if we are updating or creating, passing values to new entry
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        //choosing function to use depending on if like exists
        if ($update){
            $like->update();
        } else {
            $like->save();
        }
        //i could return a message but i will:
        return null;

    }
}
