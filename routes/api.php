<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestsController;
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

/**
 |--------------------------------------------------------------------------
 | AUTH
 |--------------------------------------------------------------------------
 */
Route::prefix('auth')->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
});

/**
 |--------------------------------------------------------------------------
 | CRUDs AUTO
 |--------------------------------------------------------------------------
 */
$endPoints = [
    'users',
    'properties'
];

foreach ($endPoints as $endPoint) {
    $ControllerClassName = implode('', array_map('ucfirst', explode('-', $endPoint)));
    $controllerClass = '\\App\\Http\\Controllers\\'. $ControllerClassName .'Controller';

    if (class_exists($controllerClass)) {
        Route::middleware('auth:sanctum')->prefix($endPoint)->group(function() use ($controllerClass) {

            if (method_exists($controllerClass, 'index')) {
                Route::get('/', [$controllerClass, 'index']);
            }

            if (method_exists($controllerClass, 'get')) {
                Route::get('/{model}', [$controllerClass, 'get'])->where('model', '\d+');
            }

            if (method_exists($controllerClass, 'store')) {
                Route::post('/', [$controllerClass, 'store']);
            }

            if (method_exists($controllerClass, 'update')) {
                Route::put('/{model}', [$controllerClass, 'update'])->where('model', '\d+');
            }

            if (method_exists($controllerClass, 'delete')) {
                Route::delete('/{model}', [$controllerClass, 'delete'])->where('model', '\d+');
            }
        });
    }
}
