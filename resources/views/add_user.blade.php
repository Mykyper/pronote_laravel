<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
    <link rel="stylesheet" href="{{ asset('css/Accueil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add_teacher.css') }}">
</head>

<body>
    <header>
        <h1>Créer un nouvel utilisateur</h1>
    </header>
    <main>
        <div class="form-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('users.store') }}" method="POST" class="user-form">
                @csrf

                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <label for="role">Rôle :</label>
                <select id="role" name="role" required>
                    <option value="coordinateur">Coordinateur</option>
                    <option value="enseignant">Enseignant</option>
                </select>

                <button type="submit">Créer utilisateur</button>
            </form>
        </div>
    </main>
</body>

</html>