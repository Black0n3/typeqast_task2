<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\PlanetsController;
use App\Http\Controllers\StarshipsController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\VehiclesController;
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

Route::get('/', [ApiController::class, 'api']);

Route::get('films', [FilmsController::class, 'index']);
Route::get('films/{id}/show_all', [FilmsController::class, 'show_all']);
Route::get('films/{id}/{type}', [FilmsController::class, 'type']);
Route::get('films/{id}/', [FilmsController::class, 'show']);


Route::get('people', [PeopleController::class, 'index']);
Route::get('people/{id}/{type}', [PeopleController::class, 'type']);
Route::get('people/{id}/', [PeopleController::class, 'show']);

Route::get('planets', [PlanetsController::class, 'index']);
Route::get('planets/{id}/{type}', [PlanetsController::class, 'type']);
Route::get('planets/{id}/', [PlanetsController::class, 'show']);

Route::get('species', [SpeciesController::class, 'index']);
Route::get('species/{id}/{type}', [SpeciesController::class, 'type']);
Route::get('species/{id}/', [SpeciesController::class, 'show']);

Route::get('starships', [StarshipsController::class, 'index']);
Route::get('starships/{id}/{type}', [StarshipsController::class, 'type']);
Route::get('starships/{id}/', [StarshipsController::class, 'show']);

Route::get('vehicles', [VehiclesController::class, 'index']);
Route::get('vehicles/{id}/{type}', [VehiclesController::class, 'type']);
Route::get('vehicles/{id}/', [VehiclesController::class, 'show']);
