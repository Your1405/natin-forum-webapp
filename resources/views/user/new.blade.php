<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nieuwe Gebruiker</title>
    <link rel="stylesheet" href="{{asset('storage/styles/style register.css')}}">
</head>
<body>
    <main>
        <div class="pagebackg">
            <div class="registerbox">
            
             <h4>Welkom op de NATIN Forum, {{ $username->username }}</h4>
             <form action="/user/new" method="POST">
                @csrf
                <label for="geboorteDatum">Geboorte Datum</label>
                <input type="date" name="geboorteDatum">
                <br>
                <label for="geslacht">Geslacht</label>
                <select name="geslacht">
                    <option value="1">Man</option>
                    <option value="2">Vrouw</option>
                    <option value="3">Liever niet zeggen</option>
                </select>
                <br>
               <label for="userType">Student of Docent?</label>
               <select name="userType">
                <option value="1">Student</option>
                <option value="2">Docent</option>
               </select>
                </br>
                <label for="userBio">Over mij:</label>
                <textarea name="userBio"></textarea>
              <input class="logregbutton" type="submit" value="Gegevens opslaan">
              </form> 
            </div>
        </div>
    </main>
</body>
</html>