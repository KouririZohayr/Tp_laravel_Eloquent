<?php

namespace App\Http\Controllers;

use App\Models\avi;
use App\Models\etudiant;
use App\Models\formation;
use Illuminate\Http\Request;

class AviController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avis = avi::all();
        
        $formation = formation::find(1);
        $etudiant = etudiant::find(1);
        $formation->avis()->attach($etudiant,['points' => 20]);

        /* 
        pour supprimer => $formation->avis()->detach($etudiant);*/
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(avi $avi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(avi $avi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, avi $avi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(avi $avi)
    {
        //
    }
}
