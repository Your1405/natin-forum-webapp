<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | {{ $postInfo['postTitel'] }}</title>
</head>
<body>
    <article class="forum-post">
        <h1>{{ $postInfo['postTitel'] }}</h1>
        <div>
            <pre>{{ $postInfo['postBeschrijving'] }}</pre>
            <p>Post Auteur: <a href="/user/profile/{{ $postInfo['postAuteur'] }}">{{ $postInfo['username'] }}</a></p>
            <p>Gemaakt om: {{ $postInfo['postTijd'] }}</p>
            <p>Categorie: {{ $postInfo['categorieBeschrijving']}}</p>
        </div>
        <a href="/home">Terug naar home</a>
    </article>
</body>
</html>