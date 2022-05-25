<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natin Forum | Login</title>
    <link rel="stylesheet" href="{{asset('storage/styles/style.css')}}">
</head>
<body>
    <main>
        <div class="login-container">
            <img src="{{asset('storage/images/natinlogo.png')}}" alt="natin logo" width="87" height="106">
            <a href="/register">Register</a>
            <form method="POST" action="/login">
                @csrf
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <input type="submit" value="Inloggen">
            </form>
        </div>
    </main>
</body>
</html>