<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    // Afficher le formulaire de création de module
    public function create()
    {
        return view('module');
    }

    // Traiter la création de module
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $module = new Module();
        $module->nom = $request->input('nom');
        $module->save();

        return redirect()->route('modules.create')->with('success', 'Module créé avec succès !');
    }
}
