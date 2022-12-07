<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\JobVacancyController;
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

Route::apiResource('/candidates', CandidateController::class);

Route::apiResource('/job-vacancies', JobVacancyController::class);

Route::post('/job-vacancies/ongoing/{status}/', JobVacancyController::class, 'ongoingJobVacancy');

Route::post('/job-vacancies/paused/{status}/', JobVacancyController::class, 'pausedJobVacancy');
