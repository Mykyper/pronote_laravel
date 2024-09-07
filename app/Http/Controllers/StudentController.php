<?php

namespace App\Http\Controllers;

use App\Models\ParentModel; // Assurez-vous que ce modèle existe
use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        // Récupère tous les parents et classes
        $parents = ParentModel::all();
        $classes = Classe::all();

        // Passe les données à la vue
        return view('add_student', compact('parents', 'classes'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:eleves,email',
            'password' => 'required|string|min:8',
            'parent_id' => 'required|exists:parents,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        // Création d'un nouvel élève
        \App\Models\Eleve::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'parent_id' => $request->input('parent_id'),
            'classe_id' => $request->input('classe_id'),
        ]);

        return redirect()->route('students.create')->with('success', 'Élève ajouté avec succès !');
    }
}
