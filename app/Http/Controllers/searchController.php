<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\etudiant;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function searchEtudiant(Request $request){
        $query=$request->search;
        
         if($query!=''){
            $data=etudiant::where('nom','like','%'.$query.'%')
            ->orWhere('prenom','like','%'.$query.'%')
            ->orWhere('adresse','like','%'.$query.'%')
            ->orderBy('codeE','desc')->get();
        }
      
        $result="";
        if($data->count()!=0){
          
            foreach($data as $etudiant){

                $etudiant->idclasse =classe::find($etudiant->idclasse)->libelle;
                
                $result.= '<tr class="bg-white border-b">
                                
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    '. $etudiant->nom .'
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                   '. $etudiant->prenom .'
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                   '. $etudiant->adresse .'
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    '. $etudiant->dateNaissance .' 
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    '. $etudiant->idclasse .'
                </td>
                <td class="text-sm font-light px-6 py-4 flex whitespace-nowrap ">
                  <a href="/formations/classe/etudiantsInfo/{{ '.$etudiant->codeE.' }}" class="bg-green-500 mx-5 hover:bg-green-900 text-white font-bold py-2 px-4 border border-green-500 rounded">
                    Show info 
                  </a>
                    <a href="/etudiants/{{'. $etudiant->codeE .' }}/edit" class="bg-green-500 mx-5 hover:bg-green-900 text-white font-bold py-2 px-4 border border-green-500 rounded">
                        UPDATE
                    </a>
                  
                    <form  action="{{ url("delete",/etudiants"."/".'.$etudiant->codeE.') }}" method="POST">
                 
                      <button   class="bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 border border-red-500 rounded">
                        
                        DELET
                      </button>
                    </form>
    
                </td>
              </tr class="bg-white border-b">';
            }
           
        }
        return response($result);
        
    }

}
