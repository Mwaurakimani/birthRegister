<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\HospitalController;
use App\Models\entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PdfController;

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



Route::get('/Account',[AdminController::class,'account'])->middleware('auth');

Route::get('/entriesPrint/{id}', [PdfController::class,'index']);

Route::get('/download/{id}', [PdfController::class,'downloadPost']);


Route::middleware(['auth', 'hospital'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/Dashboard', function () {
        $query = entry::select('*');

        if (Auth::user()->Title == 'Registrar') {
        } else {
            $query = $query->where('user_id', Auth::user()->id);
        }

        $records = $query->get();


        return view('dashboard')->with([
            'records' => $records
        ]);
    })->name('dashboard');

    Route::resource('Hospital', HospitalController::class);

    Route::resource('Administrator', AdminController::class);

    Route::resource('Entries', EntriesController::class);

});

//ajax
//filter Dashboard

Route::post('/filterData',function (Request $request){
    $data = $request->data;

    $query = entry::where('user_id',Auth::user()->id);

    if(isset($data['date_created'])){
        $query = $query->whereRaw(' DATE(created_at) = ?',$data['date_created']);
    }
    if($data['date_of_birth']){
        $query = $query->whereRaw(' DATE(dateOfBirth) = ?',$data['date_of_birth']);
    }
    if($data['last_name']){
        $query = $query->where('childLastNam','LIKE','%'.$data['last_name'].'%');
    }
    if($data['gender']){
        $query = $query->where('gender',$data['gender']);
    }
    if($data['typ_of_birth']){
        $query = $query->where('typeOfBirth',$data['typ_of_birth']);
    }

    $records = $query->get();

    $view = view('components.App.Tables.dashboard-table')
        ->with(
            ['records' => $records]
        )->render();

    return $view;
});



require __DIR__ . '/auth.php';

