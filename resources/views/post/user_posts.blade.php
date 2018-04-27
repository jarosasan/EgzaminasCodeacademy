@extends ('layouts/app')
@section('content')
	<div class="container text-center">
		<h1>All {{$user->name}} posts</h1>
		<br>
		<hr>
		@foreach($posts as $post)
			<h2><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h2>
			<br>
			<p>{{$post->text}}</p>
		@endforeach
		@if($user->id == \Illuminate\Support\Facades\Auth::id())
			<a class="btn btn-primary" href="{{route('post.create')}}">Create new post</a>
		@endif
	</div>
@endsection