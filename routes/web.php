<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;


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

Route::get('/hello', function () {
    // Mengambil nama database dari konfigurasi
    $databaseName = config('database.connections.mysql.database');
    return view('hello', ['databaseName' => $databaseName]);
});

Route::post('/karyawan/tambah', [KaryawanController::class, 'tambahKaryawan']);


Route::get('/csrf-token', function () {
    return csrf_token();
});

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);


