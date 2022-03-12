<?php

use App\Http\Controllers\Student\StudentController;
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
    return redirect()->route('students.index');
});

Route::resource('students', 'Student\StudentController');

Route::get('export', [StudentController::class,'export'])->name('export');
Route::get('importExportCsv',[StudentController::class,'import-export-csv'] );
Route::post('import', [StudentController::class,'import'])->name('import');
Route::get('search', [StudentController::class,'search']);


/*
Route::get('export-csv', 'StudentController@export');
Route::post('import-csv', 'StudentController@import');
Route::get('import-export-csv', 'StudentController@importExportCsv');*/