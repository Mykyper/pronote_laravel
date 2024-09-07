<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\Seance;
use Carbon\Carbon;

class StudentAuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('eleve_log');
    }

    // Traiter la connexion
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Vérifiez les identifiants
        $eleve = Eleve::where('email', $credentials['email'])->first();
    
        if ($eleve && password_verify($credentials['password'], $eleve->password)) {
            // Authentifier l'utilisateur et stocker son ID et nom dans la session
            $request->session()->put('student_id', $eleve->id);
            $request->session()->put('student_name', $eleve->nom . ' ' . $eleve->prenom);
            $request->session()->put('classe_id', $eleve->classe_id);
    
            // Rediriger vers une page protégée ou dashboard
            return redirect()->route('eleve_interface.show');
        }
    
        // Si les informations d'identification sont incorrectes
        return redirect()->back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

    // Afficher l'interface de l'élève avec l'emploi du temps
    public function show()
    {
        // Récupérer les informations de l'élève depuis la session
        $studentName = session('student_name', 'Invité');
        $classId = session('classe_id');
    
        if (!$classId) {
            return redirect()->route('login')->withErrors(['error' => 'Erreur de connexion.']);
        }
    
        // Récupérer les 5 dates les plus récentes où il y a des séances pour la classe
        $recentDates = Seance::where('class_id', $classId)
            ->orderBy('date', 'asc')
            ->take(10)
            ->pluck('date')
            ->unique()
            ->toArray();
    
        $emploiDuTemps = [];
    
        // Pour chaque date, récupérer les séances du matin et du soir
        foreach ($recentDates as $date) {
            $seancesMatin = Seance::where('class_id', $classId)
                ->whereDate('date', $date)
                ->where('periode', 'matin')
                ->orderBy('created_at', 'desc')
                ->get();
    
            $seancesSoir = Seance::where('class_id', $classId)
                ->whereDate('date', $date)
                ->where('periode', 'soir')
                ->orderBy('created_at', 'desc')
                ->get();
    
            $emploiDuTemps[$date]['matin'] = $seancesMatin;
            $emploiDuTemps[$date]['soir'] = $seancesSoir;
        }
    
        return view('eleve_interface', [
            'studentName' => $studentName,
            'emploiDuTemps' => $emploiDuTemps
        ]);
    }
}
