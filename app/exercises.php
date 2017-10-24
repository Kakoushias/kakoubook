<?php

//1. All Posts for a given User.
//2. All Posts, groupped by author (tip: use groupBy() clause)
//3. The post with the most likes.
//4. All authors who have at least 2 posts.
//5. All authors whose Posts have at least 2 likes.

$user= User::find(1);
//1

$user_id = $user->id;

$posts = Post::where('user_id', '=', $user_id)->get();

$user->posts()->where('user_id', '=', $user->id)->get();




//2


$posts = DB::table('posts')->groupBy('user_id')->having('user_id', '>', 20)->get();


$post = Post::groupBy('user_id')->having('user_id', '>', 20)->get();


//3
//thelw na kamw group oulla ta entries ana post, jie na evrw pio post_id eshei ta perissotera entries.
// eprepe na valw kati me raw?en ekatalava to raw.

//DB::table('likes')->groupBy('post_id')->max();

$posts = Like::get();
$posts->groupBy('user_id')->max();

//4

Eloquent Query:
$posts = Post::where('author_id', '=', $authorId)->get();

Query Builder Query:
$posts = DB::table('posts')->where('author_id', '=', $authorId)->get();

Relationship:
$author = User::find($authorId);
$posts = $author->posts;







