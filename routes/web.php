<?php

use App\Http\Controllers\athentificationController;
use App\Http\Controllers\AviController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\searchController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('formations',FormationController::class)->middleware(['auth']);
Route::resource('classes',ClasseController::class)->middleware(['auth']);
Route::resource('etudiants',EtudiantController::class)->middleware(['auth']);
Route::resource('avis',AviController::class)->middleware(['auth']);
route::get('/formations/classes/{idf}', 'App\Http\Controllers\AfficheclassController@afficheclasseFormation' )->middleware(['auth']);
route::get('/formations/classe/etudiants/{idc}', 'App\Http\Controllers\AfficheclassController@afficheEtudiantClasse' )->middleware(['auth']);
/* route::get('/formations/classe/etudiantsInfo/{idE}', 'App\Http\Controllers\AfficheclassController@afficheEtudiantinfo' )->middleware(['auth']);
 */
route::get('/search', [searchController::class,'searchEtudiant'])->middleware(['auth']);
route::get('/login',function(){return view('athentification');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
/* route::post('/login',[athentificationController::class,'login']); */
/* Auth::routes([athentificationController::class,'login']); */
?>



