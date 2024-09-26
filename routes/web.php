<?php

// use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [FilesController::class, 'index'])->name('home');
Route::post('/generate-link', [FilesController::class, 'insertFileInfo'])->name('generate_link');
Route::get('download-file/{file_id}', [FilesController::class, 'downloadFile'])->name('download_file');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::get('/register',[AuthController::class, ''])
// Route::get('/', [FilesController::class, 'index'])->name('home');
// Route::post('/file-doenload/{uniquid}', [FilesController::class, 'insertFileInfo'])->name('generate_link');

//===================Authentication============================
Route::get('login', [AuthController::class, 'index'])->name('login');

Route::get('register', [AuthController::class, 'index'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login.post'); 
Route::get('logout', [AuthController::class, 'logOut'])->name('logout');

//=========================User Dashboard=======================
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::delete('delete_file_link', [DashboardController::class, 'deleteFileLink'])->name('delete_file_link');



