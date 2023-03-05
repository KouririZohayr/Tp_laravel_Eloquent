<?php

namespace App\Models;
use  App\Models\formation;
use  App\Models\etudiant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $primaryKey='idc';
    protected $fillable = ['libelle', 'NombreMax','idformation'];
    public function foromations(){
        return $this->belongsTo(formation::class,'idformation');
    }
    
    public function etudiants(){
        return $this->hasMany(etudiant::class,'idclasse') ;
    }
}
