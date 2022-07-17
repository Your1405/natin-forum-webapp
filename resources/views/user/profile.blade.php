<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | Profiel van {{ $userInfo['username'] }}</title>
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
    
    <main>
        <div class="contentcenterblock">
         <a class="terug-naar-home-button" href="/home">Terug naar home</a>
         <h1>Profiel van: {{ $userInfo['username'] }} </h1>
         <div>
              <p><b>Username: </b></p>
              <p>{{ $userInfo['username'] }}</p>
         </div>
         <div>
              <p><b>Email: </b></p>
            <p>{{ $userInfo['email'] }}</p>
         </div>
         <div>
               <p><b>Geboorte Datum: </b></p>
              <p>{{ $userInfo['geboorteDatum'] }}</p>
         </div>
         <div>
               <p><b>Geslacht: </b></p>
               <p>{{ $userInfo['geslachtBeschrijving'] }}</p>
         </div>          
         <div>
               <p><b>Soort Gebruiker: </b></p>
                <p>{{ $userInfo['userTypeDescription'] }}</p>
         </div>
         <div>
                <p><b>Over mij: </b></p>
               <p>{{ $userInfo['userBio'] }}</p>
         </div>
         @if($userid)
            <a class="gebruikers-geg-button" href="/user/edit">Gebruikers gegevens bewerken</a>
            <a class="verw-acc-button" href="/user/delete">Verwijder account</a>
         @endif
        </div>

        
    </main>
</body>
</html>