<?php

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


Route::get('/', 'MainPageController@show');

Route::get('/query/{id_brand}', 'Controller@query');

Route::get('/discription/{id}', 'Controller@getDiscription');

Route::group(['prefix' => 'actions'], function () {

    Route::get('/', function () {
        return view('actions');
    });

    Route::group(['prefix' => 'edit'], function () {

        Route::get('/', function () {
            return view('tables');
        });

        Route::group(['prefix' => 'brands'], function () {

            Route::get('/', function (){
                $brands=\App\Model\Brand::all();
                return view('brands', ['brands'=>$brands]);
            });

            Route::get('/{id}', function ($id) {
                $brand = \App\Model\Brand::where('id', $id)->take(1)->get()[0];
                return view('editbrand', ['brand' => $brand]);
            });
        });

        Route::group(['prefix' => 'models'], function (){

            Route::get('/', function () {
                $models = \App\Model\Model::all();
                return view('models', ['models'=>$models]);
            });

            Route::get('/{id}', function ($id) {
                $model = \App\Model\Model::where('id', $id)->take(1)->get()[0];
                return view('editmodel', ['model' => $model]);
            });
        });
    });

    Route::group(['prefix' => 'add'], function () {

        Route::get('/', function () {
            return view('tables');
        });

        Route::get('/brands', function (){
            return view('createbrand');
        });

        Route::get('/models', function (){
            return view('createmodel', ['message' => '']);
        });

    });

    Route::group(['prefix' => 'del'], function () {

        Route::get('/', function () {
            return view('tables');
        });

        Route::get('/brands', function () {
            $brands = \App\Model\Brand::all();
            return view('delbrand', ['brands'=>$brands]);
        });

        Route::get('/models', function (){
            $models = \App\Model\Model::all();
            return view('delmodel', ['models'=>$models]);
        });

    });
});

Route::group(['prefix'=>'tables'], function (){

    Route::get('/brands', function (){
        $brands = \App\Model\Brand::all();
        return view('tablebrands', ['brands'=>$brands]);
    });

    Route::get('/models', function (){
        $models = \App\Model\Model::all();
        return view('tablemodels', ['models'=>$models]);
    });
});

Route::resource('brands', 'BrandsController');

Route::resource('models', 'ModelsController');

