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
    Route::post('/add', [MemberController::class, 'create'])->name('member_add');
    Route::post('/update',[MemberController::class, 'update']);
    Route::post('/{id}/delete', [MemberController::class, 'delete']);
});

Route::prefix('/project')->group(function () {
    Route::post('', [ProjectController::class, 'create'])->name('project_add');
    Route::post('/update', [ProjectController::class, 'update'])->name('project_update');
    Route::post('/{id}/delete', [ProjectController::class, 'delete']);
});

Route::prefix('/team')->group(function () {
    Route::post('/add', [TeamController::class, 'create'])->name('team_add');
    Route::post('/operate', [TeamController::class, 'operateTeam'])->name('team_operate');
    Route::post('/{id}/delete', [TeamController::class, 'delete']);
});

Route::prefix('mentor')->group(function () {
    Route::post('/add', [MemberController::class, 'createMentorStudents'])->name('mentor_add');
    Route::post('/operate', [MemberController::class, 'operateMentorStudents'])->name('mentor_operate');
    Route::post('{id}/delete', [MemberController::class, 'resetMentor']);
});

Route::post('member-projects', [MemberController::class, 'handleMemberProjects']);
