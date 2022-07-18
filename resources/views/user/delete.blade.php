<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | Verwijder account</title>
    <link rel="stylesheet" href="{{asset('storage/styles/style 2.css')}}">
</head>
<body>
    <div class="container">    @if($accountDeleted == false)
            <h1>Bent u zeker dat u uw account wilt verwijderen?</h1>
            <h3>Als uw account is verwijderd, gaat u het nooit meer terug kunnen krijgen. Uw gegevens en posts zullen verwijderd worden.</h3>
            <form action="/user/delete" method="POST">
                @csrf
                <button class="ja-button" name="btn" type="submit" value="ja">Ja</button>
                <button class="nee-button" name="btn" type="submit" value="nee">Nee</button>
            </form>
        @else 
            <h1>Wij zullen u missen.</h1>
            <a href="/logout">Verlaat website :(</a>
        @endif
    </div>
</body>
</html>