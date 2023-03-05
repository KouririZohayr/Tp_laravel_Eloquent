<?php

namespace App\Models;
use App\Models\classe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
    protected $table = 'formations';
    protected $primaryKey ='idf';
    protected $fillable = ['idf','Titre','NbreHeure'];
    public function classes(){
        return $this->hasMany(classe::class,'idformation');
    }
    public function etudiants() {
        return $this->belongsToMany(etudiant::class,'avis','idc','idf')->withPivot('points') ;
        }
    
}
