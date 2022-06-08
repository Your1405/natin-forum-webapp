<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natin Forum | Register</title>
    <link rel="stylesheet" href="{{asset('storage/styles/style.css')}}">
</head>
<body>
    <main>
        <div class="login-container">
            <div class="loginbox">
                <div class="natinlogo">
                    <img src="{{asset('storage/images/natinlogo.png')}}" alt="natin logo" width="100" height="100">
                </div>
                    <form id="login" class="inputbox" method="POST" action="/register">
                    @csrf
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="inputfield" required>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="inputfield" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="inputfield" required>
                    <label for="repeat-password">Repeat Password</label>
                    <input type="password" name="repeat-password" id="repeat-password" class="inputfield" required>
                    <input type="submit" class="submitbutton" value="Registreren">
                </form>
            </div>
        </div>
    </main>
</body>
</html>