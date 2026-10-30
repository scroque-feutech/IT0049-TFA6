@extends('layouts.app')
@section('content')
<h1>User Accounts</h1>
<table border="1" cellpadding="8">
<tr><th>Username</th><th>Full Name</th></tr>
@foreach ($users as $user)
<tr>
<td>{{ $user['username'] }}</td>
<td>{{ $user['full_name'] }}</td>
</tr>
@endforeach
</table>
@endsection
