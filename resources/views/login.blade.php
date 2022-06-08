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
            <div class="loginbox">
                <div class="natinlogo">
                    <img src="{{asset('storage/images/natinlogo.png')}}">
                </div>
                <form id="login" class="inputbox" method="POST" action="/login">
                    @csrf
                    <input type="text" class="inputfield" placeholder="Username" name="username" id="username" required>
                    <input type="password" class="inputfield" placeholder="Password" name="password" id="password" required>
                    <button type="submit" class="submitbutton" value="Inloggen">Log in</button>
                </form>
            </div>    
        </div>
    </main>
</body>
</html>