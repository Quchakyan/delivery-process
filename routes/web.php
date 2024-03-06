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
Route::get('/', [MemberController::class, 'index'])->name('members');

Route::prefix('/member')->group(function () {
    Route::post('', [MemberController::class, 'create']);
    Route::patch('',[MemberController::class, 'update']);
});
