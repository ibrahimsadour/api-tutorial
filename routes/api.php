<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\Admin\AuthController ;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * @todo all routes / api here must be api authentacated
 */
Route::group(['middleware' => ['api','checkPassword','changelanguage'],'namespace' => 'Api'], function () {

    Route::post('get-main-categories',[CategoriesController::class, 'index']);

    Route::post('get-categories-byId',[CategoriesController::class, 'getCategoryById']);

    Route::group(['prefix' => 'admin','namespace'=>'Admin'],function (){
        Route::post('login', [AuthController::class, 'login']);
    });

});  
Route::group(['middleware' => ['api','checkPassword','changeLanguage','checkAdminToken:admin-api'], 'namespace' => 'Api'], function () {

   
});  
