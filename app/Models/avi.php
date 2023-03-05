<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avi extends Model
{
    use HasFactory;
    protected $table='avis' ;
    protected $primaryKey = ['ide','idf'];
    protected $fillable  = ['ide','idf','points'];
    public $incrementing = false;
}
