<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SpeciesController;


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

Route::group(['prefix' => 'animals'], function(){
    Route::get('', [AnimalController::class, 'index'])->name('animal.index');
    Route::get('create', [AnimalController::class, 'create'])->name('animal.create');
    Route::post('store', [AnimalController::class, 'store'])->name('animal.store');
    Route::get('edit/{animal}', [AnimalController::class, 'edit'])->name('animal.edit');
    Route::post('update/{animal}', [AnimalController::class, 'update'])->name('animal.update');
    Route::post('delete/{animal}', [AnimalController::class, 'destroy'])->name('animal.delete');
    Route::get('show/{animal}', [AnimalController::class, 'show'])->name('animal.show');
    Route::get('pdf/{animal}',[AnimalController::class, 'pdf'])->name('animal.pdf');
});

Route::group(['prefix' => 'managers'], function(){
    Route::get('', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('create', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('store', [ManagerController::class, 'store'])->name('manager.store');
    Route::get('edit/{manager}', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::post('update/{manager}', [ManagerController::class, 'update'])->name('manager.update');
    Route::post('delete/{manager}', [ManagerController::class, 'destroy'])->name('manager.delete');
    Route::get('show/{manager}', [ManagerController::class, 'show'])->name('manager.show');
});

Route::group(['prefix' => 'species'], function(){
    Route::get('', [SpeciesController::class, 'index'])->name('specie.index');
    Route::get('create', [SpeciesController::class, 'create'])->name('specie.create');
    Route::post('store', [SpeciesController::class, 'store'])->name('specie.store');
    Route::get('edit/{specie}', [SpeciesController::class, 'edit'])->name('specie.edit');
    Route::post('update/{specie}', [SpeciesController::class, 'update'])->name('specie.update');
    Route::post('delete/{specie}', [SpeciesController::class, 'destroy'])->name('specie.delete');
    Route::get('show/{specie}', [SpeciesController::class, 'show'])->name('specie.show');
});