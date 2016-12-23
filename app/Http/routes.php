<?php



Route::get('rest/api/products', 'TempController@products');
Route::get('rest/api/canvas/{id}', 'TempController@loadOne');
Route::post('rest/api/canvas', 'TempController@save');

Route::auth();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboards.index');
    });
    Route::get('/dashboard', 'DashboardsController@index');
    

    Route::get('/users/permissions', 'UsersController@rolesNPermissions');
    Route::post('/users/permissions', 'UsersController@updateRolesNPermissions');
    Route::get('/users/roles', 'UsersController@rolesNUsers');
    Route::post('/users/roles', 'UsersController@updateRolesNUsers');
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/delete', 'UsersController@destroy');
    Route::get('/profile', 'UsersController@profile');


    Route::resource('catalogs', 'CatalogsController');
    Route::get('catalogs/{id}/delete', 'CatalogsController@destroy');
    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/delete', 'CategoriesController@destroy');
    Route::resource('sub-categories', 'SubCategoriesController');
    Route::get('sub-categories/{id}/delete', 'SubCategoriesController@destroy');

    Route::resource('products', 'ProductsController');
    Route::get('products/{id}/delete', 'ProductsController@destroy');
    Route::get('products/{id}/manage-composite-products', 'ProductsController@manageComposites');
    Route::get('products/create/product', 'ProductsController@createProduct');
    Route::get('products/create/composite-product', 'ProductsController@createCompositeProduct');
    Route::get('products/create/pack', 'ProductsController@createPackProduct');
    Route::post('products/selected', 'ProductsController@updateDragndrop');
    Route::post('products/remove', 'ProductsController@removeDragndrop');
    Route::post('packs/selected', 'ProductsController@updatePackDragndrop');
    Route::post('packs/remove', 'ProductsController@removePackDragndrop');
    Route::post('products/packs', 'ProductsController@addPack');

    Route::resource('packs', 'PacksController');
    Route::get('packs/{id}/delete', 'PacksController@destroy');
    Route::resource('composite-products', 'CompositeProductsController');
    Route::get('composite-products/{id}/delete', 'CompositeProductsController@destroy');

    Route::resource('templates', 'TemplatesController');
    Route::get('templates/{id}/delete', 'TemplatesController@destroy');
    Route::post('templates/create/plan-image', 'TemplatesController@addTemplatePlansImage');
    Route::post('templates/create/plan-data', 'TemplatesController@addTemplatePlansData');
    Route::get('templates/create/add-plans', 'TemplatesController@addPlan');
    Route::get('templates/create/add-plans/{id}/canvas', 'TemplatesController@editPlanInCanvas');
    Route::get('templates/create/add-plans/{id}/delete', 'TemplatesController@deletePlanInCanvas');
    Route::post('templates/create/add-plans/{id}/canvas/templates/updates', 'TemplatesController@updatePlanDataInCanvas');
    Route::get('templates/create/add-plans/{id}/canvas/templates/load-latest', 'TemplatesController@loadPlanDataInCanvas');

    Route::resource('projects', 'ProjectsController');
    Route::get('projects/{id}/delete', 'ProjectsController@destroy');
    Route::post('projects/{id}/edit', 'ProjectsController@update');

    Route::get('temp', 'TempController@index');
    Route::get('/products1', 'TempController@products1');
    Route::post('/save', 'TempController@save');
    Route::get('/load', 'TempController@load');


    Route::get('/canvas_', 'CanvasController@indexTemplate');

    http://192.168.33.10/projects/7/canvas


    Route::get('projects/{id}/canvas', 'ProjectsController@editPlanInCanvas');
    Route::post('projects/{id}/canvas/templates/updates', 'ProjectsController@updatePlanDataInCanvas');
    Route::get('projects/{id}/canvas/templates/load-latest', 'ProjectsController@loadPlanDataInCanvas');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('categories-by-catalog', 'CategoriesController@categoriesByCatalogId');
    Route::get('/subcategories-by-category', 'SubCategoriesController@subCategoriesByCategoryId');
    Route::get('/fields-by-subcategory', 'CustomFieldsController@fieldsBySubCategoryId');
    Route::get('export/excel-format/products','ExcelFormatExportsController@productsExport');

});


Route::get('/home', 'HomeController@index');
