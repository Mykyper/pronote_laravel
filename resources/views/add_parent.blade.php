<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Parent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Parent</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('parents.store') }}" method="POST">
        @csrf

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
