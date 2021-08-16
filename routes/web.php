<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\HospitalController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/Dashboard', function () {
    $records = \App\Models\entry::all();

    return view('dashboard')->with([
        'records' => $records
    ]);
})->middleware(['auth'])->name('dashboard');

Route::resource('Hospital', HospitalController::class)->middleware(['auth']);

Route::resource('Administrators', AdminController::class)->middleware(['auth']);

Route::resource('Entries', EntriesController::class)->middleware(['auth']);


require __DIR__.'/auth.php';

