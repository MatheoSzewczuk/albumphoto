<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controlleralbums;
use App\Http\Controllers\Controllerphoto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get("/albums", [Controlleralbums::class, 'albums'])->name('albums');

Route::get("/detail/{id}", [Controlleralbums::class, 'detail'])->name('detail');

// Route pour afficher la page d'ajout de photo
Route::get('/detail/{id}/ajouter', [Controlleralbums::class, 'ajouter'])->name('album.ajouter');



// Route pour ajouter la photo (enregistrement dans la base de données)
Route::post('/detail/{id}/ajouter', [Controlleralbums::class, 'store'])->name('album.store');

