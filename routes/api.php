<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//stateless e stateful


Route::prefix('v1')->group(function () {

    /** User CRUD */
    Route::get('/users', function (Request $request) {
        $users = User::all();

//        $message = 'Registros encontrados';
//        if (count($users) === 0) {
//            $message = 'Nenhum registro encontrado.';
//        }

        $message = count($users) === 0 ? 'Nenhum registro encontrado' : 'Registros encontrados';

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => $message,
            'data' => $users
        ]);
    })->middleware('auth:sanctum');

    Route::post('/login', [UserController::class, 'login']);
});

