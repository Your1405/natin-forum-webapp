<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | Nieuwe Post</title>
    <link rel="stylesheet" href="{{asset('storage/styles/style posts.css')}}">
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
            <a class="gebruikte-new-post-btn">New Post</a>
            <a href="/logout" class="logregbutton">Uitloggen</a>
        </nav>
    </div>
     <header>
          <h1 class="titel-text">Nieuwe Post</h1>
      </header>
     <main class="main-posts-new">
         <form action="/post/new" method="POST">
             @csrf
             <label for="titel">Titel</label>
             <br>

                <input type="text" name="titel" id="titel">
                </br>
                <br>
               <label for="content">Inhoud</label>
                </br>   
             <textarea class="textarea-inhoud" name="content" id="content" cols="50" rows="20"></textarea>
             <br>
             <br>
                <label for="categorie">Categorie</label>
                <select name="categorie" id="categorie">
                   @foreach ($categories as $categorie)
                       <option value="{{ $categorie->categorieId }}">{{ $categorie->categorieBeschrijving }}</option>
                   @endforeach
                </select>
                <br>
                <br>
               <input class="maak-post-button" type="submit" value="Maak post">
           </form>
           <br>
        
           <a href="/home">Terug naar home</a>
    </main>
</body>
</html>