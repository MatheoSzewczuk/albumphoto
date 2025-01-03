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

Route::delete('/album/{albumId}/photo/{photoId}', [Controlleralbums::class, 'delete'])->name('photos.delete');
