<?php


use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Menggunakan Validasi Customer dan Admin namun bermasalah pada proses login

// Route::get('User', [UserController::class, 'getallUser']);
// Route::post('User/register', [UserController::class, 'Register']);
// Route::post('User/login', [UserController::class, 'Login'])->name('login'); 

// Route::middleware('checkTipe:Admin')->group(function () {
//     Route::post('buku/insert', [BukuController::class, 'InsertBook']); 
//     Route::get('buku/{id}/update', [BukuController::class, 'GetById']);
//     Route::put('buku/{id}/update', [BukuController::class, 'UpdateBook']);
//     Route::delete('buku/{id}/delete', [BukuController::class, 'DeleteBook']);
// });

// Route::get('buku', [BukuController::class, 'getall']);

//Menggunakan Validasi Customer dan Admin namun bermasalah pada proses login


//Rote dapat dioperasikan dengan baik
Route::get('User', [UserController::class, 'getallUser']);
Route::post('User/register', [UserController::class, 'Register']);
Route::post('User/login', [UserController::class, 'Login'])->name('login'); 
Route::post('buku/insert', [BukuController::class, 'InsertBook']); 
Route::get('buku/{id}/search', [BukuController::class, 'GetById']);
Route::put('buku/{id}/update', [BukuController::class, 'UpdateBook']);
Route::delete('buku/{id}/delete', [BukuController::class, 'DeleteBook']);
Route::get('buku', [BukuController::class, 'getall']);
//Rote dapat dioperasikan dengan baik

//Link Publikasi
https://documenter.getpostman.com/view/36047576/2sA3XSB1ng
//Link Publikasi

