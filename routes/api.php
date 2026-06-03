<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlumnoApiController;

Route::apiResource('alumnos', AlumnoApiController::class)
    ->names('api.alumnos');