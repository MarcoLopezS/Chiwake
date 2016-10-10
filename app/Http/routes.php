<?php

/* FRONTEND */

Route::get('/', ['as' => 'front.home', 'uses' => 'FrontendController@home']);
Route::get('nosotros', ['as' => 'front.nosotros', 'uses' => 'FrontendController@nosotros']);
Route::get('carta', ['as' => 'front.menu', 'uses' => 'FrontendController@menu']);
Route::get('carta/{categoria}', ['as' => 'front.menu.categoria', 'uses' => 'FrontendController@menuCategoria']);
Route::get('reservacion', ['as' => 'front.reservacion', 'uses' => 'FrontendController@reservacion']);
Route::get('corporativo', ['as' => 'front.corporativo', 'uses' => 'FrontendController@corporativoGet']);
Route::post('corporativo', ['as' => 'front.corporativo.post', 'uses' => 'FrontendController@corporativoPost']);
Route::get('contacto', ['as' => 'front.contacto', 'uses' => 'FrontendController@contacto']);

/* FORMULARIOS */
Route::post('reservacion', ['as' => 'front.reservacion.form', 'uses' => 'FrontendController@reservacionForm']);
Route::post('contacto', ['as' => 'front.contacto.form', 'uses' => 'FrontendController@contactoForm']);
Route::post('suscripcion', ['as' => 'front.suscripcion.form', 'uses' => 'FrontendController@suscripcionForm']);

/* IMAGENES */
Route::get('/upload/{folder}/{width}x{height}/{image}', ['as' => 'image.adaptiveResize', 'uses' => 'ImageController@adaptiveResize']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/* ADMINISTRADOR */
Route::group(['prefix' => 'administrador', 'namespace' => 'Admin'], function() {

    Route::get('/', ['as' => 'administrador.index', 'uses' => 'HomeController@index']);

    //NOSOTROS
    Route::get('about/nosotros', ['as' => 'administrador.about.nosotros', 'uses' => 'AboutController@nosotros']);
    Route::put('about/nosotros', ['as' => 'administrador.about.nosotrosUpdate', 'uses' => 'AboutController@nosotrosUpdate']);
    Route::get('about/misvis', ['as' => 'administrador.about.misvis', 'uses' => 'AboutController@misvis']);
    Route::put('about/misvis', ['as' => 'administrador.about.misvisUpdate', 'uses' => 'AboutController@misvisUpdate']);
    
    //STAFF
    Route::resource('staff', 'StaffController');
    Route::get('staff-order', ['as' => 'administrador.staff.order', 'uses' => 'StaffController@order']);
    Route::post('staff-order/order', ['as' => 'administrador.staff.orderForm', 'uses' => 'StaffController@orderForm' ]);

    //MENUS
    Route::get('menus/{category}', ['as' => 'administrador.menus.index', 'uses' => 'MenusController@index']);
    Route::get('menus/{category}/create', ['as' => 'administrador.menus.create', 'uses' => 'MenusController@create']);
    Route::post('menus/{category}', ['as' => 'administrador.menus.store', 'uses' => 'MenusController@store']);
    Route::get('menus/{category}/{menus}', ['as' => 'administrador.menus.show', 'uses' => 'MenusController@show']);
    Route::get('menus/{category}/edit/{menus}', ['as' => 'administrador.menus.edit', 'uses' => 'MenusController@edit']);
    Route::put('menus/{category}/{menus}', ['as' => 'administrador.menus.update', 'uses' => 'MenusController@update']);
    Route::delete('menus/{category}/{menus}', ['as' => 'administrador.menus.destroy', 'uses' => 'MenusController@destroy']);

    //CATEGORIAS DE MENUS
    Route::resource('menus_categories', 'MenuCategoriesController');
    Route::get('menus_categories-order', ['as' => 'administrador.menus_categories.order', 'uses' => 'MenuCategoriesController@order']);
    Route::post('menus_categories-order/order', ['as' => 'administrador.menus_categories.orderForm', 'uses' => 'MenuCategoriesController@orderForm' ]);

    //FRASES
    Route::resource('phrases', 'PhrasesController');

    //SLIDERS
    Route::resource('slider', 'SlidersController');

    //CONFIGURACIÓN
    Route::get('config', ['as' => 'administrador.config.edit', 'uses' => 'ConfigsController@edit']);
    Route::put('config', ['as' => 'administrador.config.update', 'uses' => 'ConfigsController@update']);


    //USUARIO
    Route::resource('users', 'UsersController');
    Route::get('profile', ['as' => 'administrador.users.profile', 'uses' => 'UsersController@profile' ]);
    Route::post('profile/password', ['as' => 'administrador.users.profilePassword', 'uses' => 'UsersController@profileChangePassword' ]);

});