<?php

namespace App\Http\Controllers;

use App\Models\avi;
use App\Models\classe;
use App\Models\etudiant;
use App\Models\formation;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /*  $etudiant = etudiant::find(4);
        $classe = $etudiant->avis()->get();
        return $classe; */
        $etudiants=etudiant::all();
        foreach($etudiants as $etudiant){
            $etudiant->idclasse =classe::find($etudiant->idclasse)->libelle;
        }
        return view('etudiants',['etudiants'=>$etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes=classe::select('idc','libelle')->get();
        return view('ajouterUtedient',['classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $classe=classe::find($request->idclasse);
       $idetudiant=etudiant::select('codeE')->get();
        $etudiants = new etudiant([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' =>  $request->adresse,
            'dateNaissance' => $request->dateNaissance,
            ]); 
       
        $classe->etudiants()->save($etudiants);
        $formation=$classe->foromations()->get();
        $newEtudiant=etudiant::whereNotIn('codeE', $idetudiant)->get();
        $newEtudiant[0]->formations()->attach($formation[0],['points' => $request->points]);      
        return redirect('/etudiants');
    }
    /**
     * Display the specified resource.
    */
    public function show(etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(etudiant $etudiant)
    {
        $classe=classe::select('idc','libelle')->where('idc','<>',$etudiant->idclasse)->get();

        $points=avi::select('points')->where('ide',$etudiant->codeE)->get();
        return view('editerEtudiant',["etudiants"=>$etudiant , 'classinfos'=>$classe,'points'=>$points[0]->points]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, etudiant $etudiant)
    {
        
        $classe = classe::find($etudiant->idclasse);
        $etudiantup = $classe->etudiants()->find($etudiant->codeE); 
        
        $etudiantup->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'dateNaissance' => $request->dateNaissance,
            'idclasse' => $request->idclasse,
        ]); 
        $avi=avi::where('ide',$etudiantup->codeE);
        $avi->update([
            'points' => $request->points, 
        ]);
       
        return redirect('/etudiants');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(etudiant $etudiant)
    {   
        avi::where('ide',$etudiant->codeE)->delete();
        $etudiant->delete();
        return  redirect('/etudiants');
    }
}
