<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;

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
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/teams', [TeamController::class, 'index'])->name('teams');
Route::get('/mentors', [MemberController::class, 'mentors'])->name('mentors');
Route::get('/members-projects', [MemberController::class, 'memberProjects'])->name('member-projects');
