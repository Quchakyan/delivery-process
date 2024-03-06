<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/member')->group(function () {
    Route::post('', [MemberController::class, 'create']);
    Route::patch('',[MemberController::class, 'update']);
});

Route::prefix('/project')->group(function () {
    Route::post('', [ProjectController::class, 'create']);
    Route::patch('', [ProjectController::class, 'update']);
});

Route::get('/testindex', [MemberController::class, 'index']);
Route::get('/testmentors', [MemberController::class, 'getWithStudents']);
Route::get('/testprojects', [ProjectController::class, 'index']);
Route::post('/testteam', [TeamController::class, 'create']);
Route::post('testteammembers', [TeamController::class, 'operateTeammates']);
