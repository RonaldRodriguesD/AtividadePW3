<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\NameController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/hello/{name}/{lastName?}', [NameController::class, 'name'])
->where(['name'=>'[a-z]{3,50}', 'lastName'=>'[a-z]{3,50}'])
->name('Name');

Route::get('/conta/{valor1}/{valor2}/{operacao?}', [AccountsController::class, 'operation'])
->where(['valor1' => '[0-9]+', 'valor2' => '[0-9]+'])
->name('Accounts');

Route::get('/idade/{ano}/{mes?}/{dia?}', [AgeController::class, 'age'])
->where(['year' => '[0-9]{4}', 'month' => '[0-9]{1,2}', 'day' => '[0-9]{1,2}'])
->name('Age');