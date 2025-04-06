<?php

use App\Http\Controllers\Api\ProjectsContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('projects', [ProjectsContoller::class, 'index']);

Route::get('projects/{slug}', [ProjectsContoller::class, 'show']);
