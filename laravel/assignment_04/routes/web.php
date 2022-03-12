<?php

use App\Http\Controllers\Student\StudentAPIController;
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
    //return view('welcome');
    return redirect()->route('students.index');
});

Route::resource('students', 'Student\StudentController');
Route::get('export', [StudentController::class,'export'])->name('export');
Route::get('importExportView',[StudentController::class,'importExportView'] );
Route::post('import', [StudentController::class,'import'])->name('import');

//api route
Route::get('/ajax/students/' , [StudentAPIController::class, 'showList']);
Route::get('/ajax/students/create' , [StudentAPIController::class, 'showCreate']);
Route::get('/ajax/students/{student}/edit' , [StudentAPIController::class, 'showEdit']);
