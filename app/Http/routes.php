<?php


Route::auth();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboards.index');
    });
    Route::get('/dashboard', function() {
        return view('dashboards.index');
    });

    Route::get('/users/permissions', 'UsersController@rolesNPermissions');
    Route::post('/users/permissions', 'UsersController@updateRolesNPermissions');
    Route::get('/users/roles', 'UsersController@rolesNUsers');
    Route::post('/users/roles', 'UsersController@updateRolesNUsers');
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/delete', 'UsersController@destroy');


    Route::resource('catalogs', 'CatalogsController');
    Route::get('catalogs/{id}/delete', 'CatalogsController@destroy');
    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/delete', 'CategoriesController@destroy');
    Route::resource('sub-categories', 'SubCategoriesController');
    Route::get('sub-categories/{id}/delete', 'SubCategoriesController@destroy');

    Route::resource('products', 'ProductsController');
    Route::get('products/{id}/delete', 'ProductsController@destroy');
    Route::get('products/create/product', 'ProductsController@createProduct');

    Route::resource('packs', 'PacksController');
    Route::get('packs/{id}/delete', 'PacksController@destroy');
    Route::resource('composite-products', 'CompositeProductsController');
    Route::get('composite-products/{id}/delete', 'CompositeProductsController@destroy');

    Route::resource('templates', 'TemplatesController');
    Route::get('templates/{id}/delete', 'TemplatesController@destroy');
    Route::post('templates/create/plans', 'TemplatesController@addTemplatePlans');
});


Route::get('/home', 'HomeController@index');
