<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$post = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('post/posts', ['posts'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $user = Auth::id();
	    $post = Post::create($request->except('_token')+ ['user_id'=>$user]);
	
	    return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $post = Post::findOrFail($id);
	    $user = $post->user;
	
	    return view('post/show', ['post'=>$post, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $post = Post::findOrFail($id);
	    return view('post/edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $user = Auth::id();
	    $post = Post::findOrFail($id);
	    $post = $post->update($request->except('_token')+ ['user_id'=>$user]);
	    return redirect()->route('post.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $post = Post::findOrFail($id);
	    $comments = $post->comments;
	    return redirect(route('post.index'));
    }
}
