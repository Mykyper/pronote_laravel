<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seance;

class TeacherAuthController extends Controller
{
    // Afficher le formulaire de connexion des enseignants
    public function showLoginForm()
    {
        return view('master_log');
    }

    // Traiter la connexion des enseignants
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Vérifiez les identifiants
        $user = User::where('email', $credentials['email'])->where('role', 'enseignant')->first();

        if ($user && password_verify($credentials['password'], $user->password)) {
            // Authentifier l'utilisateur et stocker son ID dans la session
            $request->session()->put('teacher_id', $user->id);

            // Rediriger vers l'interface de l'enseignant
            return redirect()->route('teacher-interface.show')->with('success', 'Connexion réussie !');
        }

        // Si les informations d'identification sont incorrectes
        return redirect()->back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

    // Afficher l'interface de l'enseignant avec l'emploi du temps
    public function show()
    {
        // Récupérer les informations de l'enseignant depuis la session
        $teacherId = session('teacher_id');
        $teacher = User::find($teacherId);

        if (!$teacher) {
            return redirect()->route('teacher.login')->withErrors(['error' => 'Erreur de connexion.']);
        }

        // Récupérer l'emploi du temps de l'enseignant
        $emploiDuTemps = Seance::where('enseignant_id', $teacherId)
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy(function($date) {
                return \Carbon\Carbon::parse($date->date)->format('d/m/Y'); // Grouper par date
            });

        return view('prof_interface', [
            'teacherName' => $teacher->nom . ' ' . $teacher->prenom,
            'emploiDuTemps' => $emploiDuTemps
        ]);
    }
}
