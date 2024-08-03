<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\routeController;

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
//get
Route::get('product/list', [routeController::class,'productList']);
Route::get('category/list',[routeController::class,'categoryList']);

//Post
Route::post('create/category',[routeController::class,'categoryCreate']);
Route::post('create/contact',[routeController::class,'contactCreate']);

Route::get('category/delete/{id}',[routeController::class,'deleteCategory']);
Route::get('category/list/{id}',[routeController::class,'detailsCategory']);


//update
Route::post('category/update',[routeController::class,'updateCategory']);


/**
 *
 *
 *
 * product list
 * localhost::8001/api/product/list  (GET)
 *
 * category list
 * localhost::8001/api/category/list (GET)
 *
 *  localhost::8001/api/category/list/{id}  (GET)
 *
 * create category
 * localhost::8001/api/create/category (POST)
 * body{
 *      name : ''
 * }
 *
 * create contact
 * http://localhost:8001/api/create/contact  (POST)
 * body{
 *
 *      name : '',
 *      email : '',
 *      phone : '',
 *      description : '',
 *      user_id : ''
 * }
 *
 * delete category
 * http://localhost:8001/api/category/delete/{id}   (GET)
 *
 *
 *
 * update category
 * http://localhost:8001/api/category/update  (POST)
 * body{
 *
 *      category_name : '',
 *      category_id  :''
 * }
 *
 */
