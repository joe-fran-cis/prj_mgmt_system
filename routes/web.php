<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});

// routes/web.php

Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
//Route::get('/tasks/{projectId}', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/projects/list', [ProjectController::class, 'list'])->name('projects.list');
Route::get('/tasks', [TaskController::class, 'list'])->name('tasks.list');
Route::get('/tasks/report', [TaskController::class, 'report'])->name('tasks.report');
Route::put('/projects/{id}/update-status', [ProjectController::class, 'updateStatus'])->name('projects.updateStatus');