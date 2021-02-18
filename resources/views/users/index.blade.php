<h1>ddd</h1>

@foreach($users as $user)
<div>{{ $user->id }}</div>
<div>{{ $user->name }}</div>
<div>{{ $user->email }}</div>
@endforeach