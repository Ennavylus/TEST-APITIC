<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/character', 'CharacterController');
Route::get('/serachcharacter/{classe}', 'CharacterController@index')->name('character.byClasse');
Route::get('/', function () {
    return redirect()->route('character.index');
});
