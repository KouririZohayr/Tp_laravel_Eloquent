<?php

namespace App\Http\Controllers;

use App\Models\avi;
use App\Models\classe;
use App\Models\etudiant;
use App\Models\formation;
use Illuminate\Http\Request;

class AfficheclassController extends Controller
{
    public function afficheclasseFormation(Request $request ,$idf){
        $formation=formation::find($idf);
        $classes=$formation->classes()->get();
        return view('classes',['classes'=>$classes]);  
    }
    public function afficheEtudiantClasse(Request $request ,$idc){
        $classe=classe::find($idc);
        $etudiants=$classe->etudiants()->get();
        return view('etudiants',['etudiants'=>$etudiants]);  
    }
    public function afficheEtudiantinfo(Request $request ,$idE){
        $etudiant=etudiant::find($idE); 
        $classe=classe::find($etudiant->idclasse);
        $formation=formation::find($classe->idformation);
        /* $etudiants=$classe->formation()->get(); */   
        $avi=avi::where('ide',$idE)->get();
        /* $etudiants=$etudiant->formations();
          $point=$etudiants->pivot->points; */ 
         /*
        $formation=formation::find($etudiants->pivot->idf)->Titre;
        $classe=classe::find($etudiant->idclasse)->libelle; */
        return view('infoEtudiant',['etudiant'=>$etudiant,'note'=>$avi[0]->points,'formation'=>$formation->Titre,'classe'=>$classe->libelle]) ;
        /* n  */  
    }
}
