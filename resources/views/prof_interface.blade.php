<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pronote Ifran</title>
  <link rel="stylesheet" href="{{ asset('css/interface.css') }}">
</head>

<body>
  <div class="app">
    <header class="header">
      <div class="title">Pronote Ifran</div>
      <div class="role">{{ $teacherName }}</div> Afficher le nom de l'enseignant
    </header>

    <div class="layout">
      <aside class="sidebar">
        <ul>
          <li class="menu-item active">
            <span class="icon">&#128197;</span> Emploi du temps
          </li>
          <li class="menu-item">
            <span class="icon">&#128202;</span> Graphiques
          </li>
          <li class="menu-item">
            <span class="icon">&#128100;</span> Absences
          </li>
        </ul>
      </aside>

      <main class="main-content">
        <div class="tabs">
          <!-- Les classes seront insérées ici -->
          <div id="classes-tabs"></div>
        </div>
      
        <div class="timetable">
          <h2>Emploi du temps</h2>
          <table id="timetable-content">
            <thead>
              <tr>
                <th>Jour</th>
                <th>Matin</th>
                <th>Après-midi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($emploiDuTemps as $date => $sessions)
                <tr>
                  <td>{{ $date }}</td>
                  <td>
                    @foreach($sessions as $session)
                      @if($session->periode === 'matin')
                        {{ $session->module->nom }}<br>
                        {{ $session->classe->niveau }} {{ $session->classe->specialité }}<br>
                        
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($sessions as $session)
                      @if($session->periode === 'soir')
                        {{ $session->module->nom }}<br>
                        {{ $session->classe->niveau }} {{ $session->classe->specialité }}<br>
                        
                      @endif
                    @endforeach
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
    <button class="modify-button">Modifier</button>
  </div>
</body>

</html>
