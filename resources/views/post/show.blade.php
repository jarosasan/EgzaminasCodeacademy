@extends('layouts.app')
@section('content')
	<div class="container">
		<h2>{{$post->title}}</h2>
		<hr>
		<p>{{$post->text}}</p>
		<br>
		<b>Creatad: {{$post->created_at}}</b>
		<p>{{$user->name}}</p>
		<br>
		@if($post->user_id == \Illuminate\Support\Facades\Auth::id())
			<a href="{{route('post.edit', $post->id)}}" role="button" class="btn btn-secondary">Edit</a>
			<form action="{{route('post.destroy', $post->id)}}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		@endif
	</div>
@endsection