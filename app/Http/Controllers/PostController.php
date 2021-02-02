<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
  public function index(){

    $posts = Post::paginate(20); // get all post
    return view('posts.index', [
      'posts'=>$posts
    ]);
  }

  public function store(Request $request){
    $this->validate($request, [
      'body'=> 'required'
    ]);

    // Post::create([
    //   'user_id'=>auth()->id(),
    //   'body' => $request->body
    // ])

    $request->user()->posts()->create($request->only('body'));

    return back();



  }

}
