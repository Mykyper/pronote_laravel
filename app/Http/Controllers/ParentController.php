<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ParentModel; // Import the Parent model
use Illuminate\Http\JsonResponse;

class ParentController extends Controller
{
    // Show the form to create a new parent
    public function create()
    {
        return view('add_parent'); // This should match the name of your Blade view file
    }

    // Store a new parent in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:parents,email',
            'password' => 'required|string|min:6', // Adjust as needed
        ]);

        // Create a new parent
        \App\Models\ParentModel::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect with a success message
        return redirect()->route('parents.create')->with('success', 'Parent ajouté avec succès !');
    }
    public function index(): JsonResponse
    {
        $parents = ParentModel::all();
        return response()->json($parents);
    }
}

