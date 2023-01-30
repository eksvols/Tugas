<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
 
<div>
    <form action="{{ url('/login') }}" method="post">
        {{ csrf_field() }}
 
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}">
 
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
 
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
 
        <button type="submit">Login</button>
    </form>
 
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
 
</body>
</html>
