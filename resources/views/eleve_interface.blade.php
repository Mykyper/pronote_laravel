<!DOCTYPE html>
<html lang="fr">

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
      <div class="student-name">{{ $studentName }}</div>
    </header>

    <div class="layout">
      <aside class="sidebar">
        <ul>
          <li class="menu-item active">
            <span class="icon">&#128197;</span> Emploi du temps
          </li>
          <li class="menu-item">
            <span class="icon">&#128100;</span> Absences
          </li>
        </ul>
      </aside>

      <main class="main-content">
        <div class="timetable">
          
          <table>
            <thead>
              <tr>
                <th>Jour</th>
                @foreach(array_keys($emploiDuTemps) as $date)
                  <th>{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>MATIN 9H00 - 12H00</td>
                @foreach($emploiDuTemps as $date => $sessions)
                  <td>
                    @foreach($sessions['matin'] as $seance)
                      {{ $seance->module->nom }}<br>
                      {{ $seance->enseignant->nom }}<br>
                    @endforeach
                  </td>
                @endforeach
              </tr>
              <tr>
                <td>APRES-MIDI 14H00 - 17H00</td>
                @foreach($emploiDuTemps as $date => $sessions)
                  <td>
                    @foreach($sessions['soir'] as $seance)
                      {{ $seance->module->nom }}<br>
                      {{ $seance->enseignant->nom }}<br>
                    @endforeach
                  </td>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>

</html>
