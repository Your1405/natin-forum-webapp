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
                <div class="buttonbox">
                    <div id="greenbutton"></div>
                    <button type="button" class="togglebutton" onclick="login()">Log in</button>
                    <button type="button" class="togglebutton" onclick="register()">Register</button>
                </div>
                <div class="natinlogo">
                    <img src="{{asset('storage/images/natinlogo.png')}}">
                </div>
                <form id="login" class="inputbox" method="POST" action="/login">
                    @csrf
                    @if ($loginError == 'username')
                        <p style="color: red;" >Credentials don't match</p> 
                    @elseif($loginError == 'password')
                        <p style="color: red;" >Password is incorrect</p> 
                    @endif
                    <input type="text" class="inputfield" placeholder="Username" name="username" id="username" required>
                    <input type="password" class="inputfield" placeholder="Password" name="password" id="password" required>
                    <button type="submit" class="submitbutton" value="Inloggen">Log in</button>
                </form>
                <form id="register" class="inputbox" method="POST" action="/register">
                    @csrf
                    <input type="text" class="inputfield" placeholder="Username" name="username" id="username" required>
                    <input type="email" class="inputfield" placeholder="Email" name="email" id="email" required>
                    <input type="password" class="inputfield" placeholder="Password" name="password" id="password" required>
                    <input type="password" class="inputfield" placeholder="Repeat Password" name="repeat-password" id="repeat-password" required>
                    <button type="submit" class="submitbutton" value="Inloggen">Register</button>
                </form>
            </div>    
        </div>
    </main>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("greenbutton");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>
</html>