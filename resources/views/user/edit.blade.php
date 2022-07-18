<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | Bewerk Gebruiker Info</title>
    <link rel="stylesheet" href="{{asset('storage/styles/style home.css')}}">
</head>
<body>
    <div class="hero">
        <nav>
            <img src="{{asset('storage/images/natinlogo.png')}}">
            <h2 class="logo">NATIN<span> Forums</span></h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Regels</a></li>
                <li><a href="#">Klachten</a></li>
                <li><a href="#">Mededelingen</a></li>
                <li><a href="#">Discussies</a></li>
                <li><a href="#">Suggesties</a></li>
                <li><a href="#">Info</a></li>
                <li><a href="/user/profile">Profiel</a></li>
            </ul>
            <a class="new-post-btn">New Post</a>
            <a href="/logout" class="logregbutton">Uitloggen</a>
        </nav>
    </div>
    <div class="contentcenterblock">
     <h1>Bewerk Gebruikers Info</h1>
        <div>
            <form method="POST" action="/user/edit">
                @csrf
                <label for="username">Username: </label>
                <input type="text" name="username" value="{{ $userInfo['username'] }}">
                <br>
                <label for="email">Email: </label>
                <input type="text" name="email" value="{{ $userInfo['email'] }}">
                <br>
                <label for="geboorteDatum">Geboorte Datum: </label>
                <input type="date" name="geboorteDatum" value="{{ $userInfo['geboorteDatum'] }}">
                <br>
                <label for="geslacht">Geslacht: </label>
                <select name="geslacht">
                    <option value="1">Man</option>
                    <option value="2">Vrouw</option>
                    <option value="3">Liever niet zeggen</option>
                </select>
                <br>
                <label for="userType">Soort Gebruiker: </label>
                <select name="userType">
                    <option value="1">Student</option>
                    <option value="2">Docent</option>
                </select>
                <label for="userBio">Over Mij: </label>
                <textarea name="userBio">{{ $userInfo['userBio'] }}</textarea>
                </div>
                <input class="gebruikers-geg-button" type="submit" value="Bewerk">
            </form>
            @if ($editStatus == "success")
                <p>Gegevens succesvol bewerkt!</p>
            @endif
            <a class="terug-naar-home-button" href="/user/profile">Terug naar profiel</a>
        </div>
    </div>
</body>
</html>