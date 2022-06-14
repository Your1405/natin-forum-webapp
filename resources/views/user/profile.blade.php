<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | Profiel van {{ $userInfo['username'] }}</title>
</head>
<body>
    <a href="/home">Terug naar home</a>
    <h1>Profiel van: {{ $userInfo['username'] }} </h1>
    <main>
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
        <a href="/user/edit">Gebruikers gegevens bewerken</a>
        <a href="/user/delete">Verwijder account</a>
    </main>
</body>
</html>