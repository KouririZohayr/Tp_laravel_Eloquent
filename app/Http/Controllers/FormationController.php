<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formation = formation::all();
      
        return view('formations',['formations'=>$formation,'username'=>Auth::user()->name]);

       /*  $formation = formation::find(2); 
         $classe = $formation->avis()->get();
        return $classe; */
        /* $formation = formation::all();
        return response()->json(['message'=>null,'data'=>$formation],200); */
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajouterFormation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $formation = formation::find(1);
        $classe = new classe([
        'libelle' => 'dd207',
        'NombreMax' => '26'
        ]);
        $formation->classes()->save($classe);
        return redirect('addclass'); */
        formation::create($request->all());
        return redirect('formations'); 
    }

    /**     
     * Display the specified resource.
     */
    public function show(formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(formation $formation)
    {
        $formationidit = formation::find($formation);
        return view('editerFormation',['formation'=>$formationidit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $formation)
    {
        $formationupdate=formation::find($formation);
        $formationupdate->Titre = $request->Titre;
        $formationupdate->NbreHeure = $request->NbreHeure;
        $formationupdate->save();
        return redirect('formations');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(formation $formation)
    {
        $formation->delete();
        return redirect('formations'); 
    }
}
