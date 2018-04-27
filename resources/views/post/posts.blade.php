@extends ('layouts/app')
@section('content')
	<div class="container text-center">
		<h1>All posts</h1>
		<br>
		<hr>
		@foreach($posts as $post)
			<h2><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h2>
			<br>
			<p>{{$post->text}}</p>
		@endforeach
		@if(\Illuminate\Support\Facades\Auth::user())
			<a class="btn btn-primary" href="{{route('post.create')}}">Create new post</a>
		@endif
		<br>
		<br>
		<div class="row">
			<div class="col-12">
				<nav aria-label="Page navigation example ">
					<ul class="pagination justify-content-center">
						{{ $posts->links("pagination::bootstrap-4") }}
					</ul>
				</nav>
			</div>
		</div>
	</div>
@endsection