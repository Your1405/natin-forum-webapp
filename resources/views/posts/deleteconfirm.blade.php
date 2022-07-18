<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bent u zeker?</title>
</head>
<body>
    <h1>Bent u zeker dat u deze post wilt verwijderen?</h1>
    <form action="/post/{{$postId}}/delete" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" name="selection" value="1">Ja</button>
        <button type="submit" name="selection" value="2">Nee</button>
    </form>
</body>
</html>