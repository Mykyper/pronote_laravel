<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Parent</title>
    <link rel="stylesheet" href="{{ asset('css/Accueil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header>
        <h1>Pronote IFRAN</h1>
    </header>
    <main>
        <div class="log">
            <form class="login-form" id="parent-login-form">
                <h1><img src="{{ asset('img/pere-et-fils.png') }}" alt="Login Icon" class="login-icon"> Espace Parents</h1>
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </main>

   
</body>

</html>
