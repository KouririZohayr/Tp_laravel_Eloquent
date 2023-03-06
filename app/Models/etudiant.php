<?php

namespace App\Models;
use App\Models\classe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;
    protected $table = 'etudiants';
    protected $primaryKey='codeE';
    protected $fillable = ['nom','prenom' ,'adresse' ,'dateNaissance' ,'nom' ,'prenom','idclasse','image'];
    public function classes(){
        return $this->belongsTo(classe::class,'idclasse');
    }
    public function formations(){
        return $this->belongsToMany(formation::class,'avis','ide','idf')->withPivot('points');
        }
}
