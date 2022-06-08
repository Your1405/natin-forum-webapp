<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natin Forum | Login</title>
    <link rel="stylesheet" href="{{asset('storage/styles/style register.css')}}">
</head>
<body>
    <main>
        <div class="login-container">
            <div class="loginbox">
                <div class="natinlogo">
                    <img src="{{asset('storage/images/natinlogo.png')}}">
                </div>
                <form id="login" class="inputbox" method="POST" action="/login">
                    {{-- @csrf
                    {{-- @if ($loginError == 'username')
                        <p style="color: red;" >Credentials don't match</p>  --}}
                    {{-- @elseif($loginError == 'password')
                        <p style="color: red;" >Password is incorrect</p> 
                    @endif --}}
                    <input type="text" class="inputfield" placeholder="Username" name="username" id="username" required>
                    <input type="password" class="inputfield" placeholder="Password" name="password" id="password" required>
                    <input type="password" class="inputfield" placeholder="Repeat password" name="password" id="password" required>
                </form>
                <form id="login" class="inputbox2" method="POST" action="/login">
                    {{-- @csrf
                    {{-- @if ($loginError == 'username')
                        <p style="color: red;" >Credentials don't match</p>  --}}
                    {{-- @elseif($loginError == 'password')
                        <p style="color: red;" >Password is incorrect</p> 
                    @endif --}}
                    <input type="text" class="inputfield" placeholder="Username" name="username" id="username" required>
                    <input type="password" class="inputfield" placeholder="Password" name="password" id="password" required>
                    <input type="password" class="inputfield" placeholder="Repeat password" name="password" id="password" required>
                </form>
                <button type="submit" class="submitbutton" value="Inloggen">Registreren</button>
            </div>    
        </div>
    </main>
</body>
</html>