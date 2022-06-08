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
                    @if ($loginError == 'userDoesNotExist')
                        <p style="color: red;" >User doesn't exist</p> 
                    @elseif($loginError == 'passwordIncorrect')
                        <p style="color: red;" >Password is incorrect</p> 
                    @endif
                    <input type="text" class="inputfield" placeholder="Username" name="username" id="username" required>
                    <input type="password" class="inputfield" placeholder="Password" name="password" id="password" required>
                    <button type="submit" class="submitbutton" value="Inloggen">Log in</button>
                </form>
                <form id="register" class="inputbox" method="POST" action="/register">
                    @csrf
                    @if ($registerError == 'nonMatchingPasswords')
                        <p style="color: red;" >Passwords don't match</p>
                    @elseif ($registerError == 'userAlreadyExists')
                        <p style="color: red;" >User already exists!</p>
                    @endif
                    <input type="text" class="inputfield" placeholder="Username" name="username" id="username" required>
                    <input type="email" class="inputfield" placeholder="Email" name="email" id="email" required>
                    <input type="password" class="inputfield" placeholder="Password" name="password" id="password" required>
                    <input type="password" class="inputfield" placeholder="Repeat Password" name="repeat-password" id="repeat-password" required>
                    <button type="submit" class="submitbutton" value="Inloggen">Register</button>
                </form>
            </div>    
        </div>
    </main>
</body>
</html>