@extends ('layouts/app')
@section('content')
	<div class="container text-center">
		<h1>All users</h1>
		<br>
		<hr>
		<a class="btn btn-primary" href="{{route('user.create')}}">Create User</a>
		<table>
			<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td></td>
					<td>@if($user->id == \Illuminate\Support\Facades\Auth::id())
							<a href="{{route('user.edit', $user->id)}}" role="button" class="btn btn-secondary">Edit</a>
							<form action="{{route('user.destroy', $user->id)}}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						@endif</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
@endsection