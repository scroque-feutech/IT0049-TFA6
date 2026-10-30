<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Laravel POS</title></head>
<body>
<nav>
<a href="{{ url('/') }}">Home</a> |
<a href="{{ url('/about') }}">About</a> |
<a href="{{ url('/customers') }}">Customers</a> |
<a href="{{ url('/users') }}">Users</a>
</nav>
<hr>
@yield('content')
</body>
</html>
