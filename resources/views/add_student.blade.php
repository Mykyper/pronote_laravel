<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Élève</title>
</head>
<body>
    <h1>Ajouter un Élève</h1>
    <form id="addStudentForm" action="{{ route('students.store') }}" method="POST">
        @csrf <!-- Laravel CSRF protection -->
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="parent">Parent:</label>
        <select id="parent" name="parent_id" required>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}">{{ $parent->nom }} {{ $parent->prenom }}</option>
            @endforeach
        </select><br><br>

        <label for="classe">Classe:</label>
        <select id="classe" name="classe_id" required>
            @foreach ($classes as $classe)
                <option value="{{ $classe->id }}">{{ $classe->niveau }} - {{ $classe->specialité }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>