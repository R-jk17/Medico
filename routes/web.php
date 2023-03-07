<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\BilanController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\RendezController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SecritaireController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('dossiers' , DossierController::class);

//Route::get('rendez', [RendezController::class,'create']);
// Route::get('ordonnances/liste', [OrdonnanceController::class,'index']);
// Route::get('ordonnances/{id}',[OrdonnanceController::class,'show']);
// Route::get('ordonnances/{id}/edit',[OrdonnanceController::class,'edit']);
// Route::put('ordonnances/{id}',[OrdonnanceController::class,'update']);
Route::resource('ordonnances',OrdonnanceController::class );
Route::resource( 'bilans',BilanController::class);
Route::resource( 'dossiers',DossierController::class);
Route::resource( 'traitements',TraitementController::class);
Route::resource( 'visites',VisiteController::class);
Route::resource( 'rendezs',RendezController::class);
Route::resource( 'factures',FactureController::class);
Route::resource( 'documents',DocumentController::class);
Route::get('/dossiers/{dossier_id}/ordonnances/create', [OrdonnanceController::class, 'create'])->name('ordonnances.create');
Route::get('/dossiers/{dossier_id}/bilans/create', [BilanController::class, 'create'])->name('bilans.create');
Route::get('/dossiers/{dossier_id}/traitements/create', [TraitementController::class, 'create'])->name('traitements.create');
Route::get('/dossiers/{dossier_id}/visites/create', [VisiteController::class, 'create'])->name('visites.create');
Route::get('/dossiers/{dossier_id}/documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::get('/rendezs/confirm/{id}', [RendezController::class, 'confirm'])->name('rendez.confirm');
Route::get('/chart', [FactureController::class, 'chart'])->name('factures.chart');
Route::get('/secritaire/create', [SecritaireController::class, 'create'])->name('secritaire.create');
Route::post('/secritaire', [SecritaireController::class, 'store'])->name('secritaire.store');

Route::get('/download/{document}', [DocumentController::class, 'download'])->name('document.download');


//Route::get('ordonnances/liste', [OrdonnanceController::class,'index']);
//Route::get('ordonnances/create', [OrdonnanceController::class,'create']);
//Route::post('ordonnances/create', [OrdonnanceController::class,'store']);
//Route::get('ordonnances/show', [OrdonnanceController::class,'show']);












// Route::resources([
//     'documents' => DocumentController::class,
// ]);

// Route::resources([
//     'traitements' => TraitementController::class,
// ]);

// Route::resources([
//     'visites' => VisiteController::class,
// ]);
