<?php

//1. All Posts for a given User.
//2. All Posts, groupped by author (tip: use groupBy() clause)
//3. The post with the most likes.
//4. All authors who have at least 2 posts.
//5. All authors whose Posts have at least 2 likes.


//1
$user= User::find(1);
$user_id = $user->id;

$user->posts()->where('user_id', '=', $user_id)->get();




//2


$posts = DB::table('posts')->groupBy('user_id')->get();
$posts = Post::groupBy('user_id')->get();

$posts = DB::table('posts')->select(DB::raw('user_id'))->groupBy('user_id')->get();
//or just
$posts = DB::table('posts')->select('user_id')->groupBy('user_id')->get();



//3
//thelw na kamw group oulla ta entries ana post, jie na evrw pio post_id eshei ta perissotera entries.
// eprepe na valw kati me raw?en ekatalava to raw.

//DB::table('likes')->groupBy('post_id')->max();

$posts = Like::get();
$posts->groupBy('user_id')->max();


or

$posts = DB::table('likes')->select(DB::raw('count("like") as total, post_id'))->groupBy('post_id')->orderBy('total', 'desc')->first();

//4

$users = DB::table('posts')->select(DB::raw('count(*) as total, user_id '))->groupBy('user_id')->where('total', '>=', 2)->get();












$posts = Post::select(DB::raw("sum('likes') as total, user_id")->max('total')

Eloquent Query:
$posts = Post::where('author_id', '=', $authorId)->get();

Query Builder Query:
$posts = DB::table('posts')->where('author_id', '=', $authorId)->get();

Relationship:
$author = User::find($authorId);
$posts = $author->posts;







