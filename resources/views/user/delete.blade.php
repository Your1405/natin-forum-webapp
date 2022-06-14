<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NATIN Forum | Verwijder account</title>
</head>
<body>
    @if($accountDeleted == false)
        <h1>Bent u zeker dat u uw account wilt verwijderen?</h1>
        <form action="/user/delete" method="POST">
            @csrf
            <button name="btn" type="submit" value="ja">Ja</button>
            <button name="btn" type="submit" value="nee">Nee</button>
        </form>
    @else 
        <h1>Wij zullen u missen.</h1>
        <a href="/logout">Verlaat website :(</a>
    @endif
</body>
</html>