<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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



Route::get('apiGet',[ApiController::class, 'apiGetCategories']);
Route::post('apiPost',[ApiController::class, 'apiNewCategory']);
Route::get("apiDelete",[ApiController::class, "apiDeleteCategory"]);
Route::get("apiedit",[ApiController::class, 'apiEditProduct']);
Route::post("apiUpdate", [ApiController::class, 'apiUpdateProduct']);
