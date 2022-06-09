<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natin Forum | Home</title>
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
            <a class="new-post-btn" href="/post/new">New Post</a>
            <a href="/logout" class="logregbutton">Uitloggen</a>
        </nav>
    </div>
    <main>
        <h1>Posts</h1>
    </main>
</body>
</html>