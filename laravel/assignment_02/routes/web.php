<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::resource('students', 'StudentController');

Route::get('export', 'StudentController@export');
Route::get('importFile', 'StudentController@importFile');
Route::post('import', 'StudentController@import');