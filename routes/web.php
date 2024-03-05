<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
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
Route::get('/', [MemberController::class,'index']);

//Route::prefix('/members')->group([
//    Route::get('/', [MemberController::class, 'index'])->name('members'),
//    Route::post('/', [MemberController::class, 'create']),
//]);
