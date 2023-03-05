<?php

namespace App\Http\Controllers;

use App\Models\classe;

use App\Models\formation;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* $classe = classe::find(4);
        $formation = $classe->foromations()->get();
        return $formation; */
            $classes=classe::all();
            foreach($classes as $classe){
                $classe->idformation=formation::find( $classe->idformation)->Titre;
            }
        return view('classes',['classes'=>$classes]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formations=formation::select('idf','Titre')->get();
      
        return view('ajouterClasse',['formations'=>$formations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formation=formation::find($request->idformation);
        $classe =new classe([
            'libelle'=>$request->libelle,
            'idformation'=>$request->idformation,
            'NombreMax'=>$request->NombreMax
        ]);
        $formation->classes()->save($classe);
        return redirect('classes'); 
    }
    /**
     * Display the specified resource.
     */
    public function show(classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $classe)
    {
        $classeedite = classe::find($classe);
        return view('editerClasses',['classe'=>$classeedite]) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $classe)
    {
        $formation=formation::find($request->idformation);
        $classe =$formation->classes()->find($classe);
        $classe->update([
            'libelle'=>$request->libelle,
            'NombreMax'=>$request->NombreMax,
        ]);
        return  redirect('classes');
    }

    /**
    
     * Remove the specified resource from storage.
     */
    public function destroy( $classe)
    {
        $classe=classe::find($classe);
        $classe->delete();
        return redirect('classes');
    }
}
