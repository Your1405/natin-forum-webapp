<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | Nieuwe Post</title>
</head>
<body>
    <header>
        <h1>Nieuwe Post</h1>
    </header>
    <main>
        <form action="/post/new" method="POST">
            @csrf
            <label for="titel">Titel</label>
            <input type="text" name="titel" id="titel">
            </br>
            <label for="content">Inhoud</label>
            </br>   
            <textarea name="content" id="content" cols="50" rows="20"></textarea>
            <br>
            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->categorieId }}">{{ $categorie->categorieBeschrijving }}</option>
                @endforeach
            </select>
            <input type="submit" value="Maak post">
        </form>
        <a href="/home">Terug naar home</a>
    </main>
</body>
</html>