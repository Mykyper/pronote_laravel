<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Accueil.css') }}">
</head>

<body>
    <header>
        <h1>
            Pronote IFRAN
        </h1>
    </header>
    <main>
        <div class="log">
            <ul>
                <a href="/student-log"><li class="list-item">
                    <img src="{{ asset('img/child-solid.svg') }}" alt="" height="50">
                    <h2>Etudiant</h2>
                </li></a>
                <hr>
                <a href="/parent-log"><li class="list-item">
                    <img src="{{ asset('img/pere-et-fils.png') }}" alt="" height="50">
                    <h2>Parent</h2>
                </li></a>
                <hr>
                <a href="/teacher/login"><li class="list-item">
                    <img src="{{ asset('img/livre.png') }}" alt="" height="50">
                    <h2>Enseignant</h2>
                </li></a>
                <hr>
                <a href="/coordinator-log"><li class="list-item">
                    <img src="{{ asset('img/chapeau-de-fin-detudes.png') }}" alt="" height="50">
                    <h2>Coordinateur</h2>
                </li></a>
                <hr>
                <a href=""><li class="list-item">
                    <img src="{{ asset('img/ordinateur.png') }}" alt="" height="50">
                    <h2>Admin</h2>
                </li></a>
            </ul>
        </div>
    </main>
</body>

</html>
