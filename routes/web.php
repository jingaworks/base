<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Regions
    Route::delete('regions/destroy', 'RegionController@massDestroy')->name('regions.massDestroy');
    Route::resource('regions', 'RegionController');

    // Places
    Route::delete('places/destroy', 'PlaceController@massDestroy')->name('places.massDestroy');
    Route::resource('places', 'PlaceController');

    // Profiles
    // Route::delete('profiles/destroy', 'ProfileController@massDestroy')->name('profiles.massDestroy');
    // Route::resource('profiles', 'ProfileController');

    // Categories
    // Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    // Route::resource('categories', 'CategoryController');

    // Subcategories
    // Route::delete('subcategories/destroy', 'SubcategoryController@massDestroy')->name('subcategories.massDestroy');
    // Route::resource('subcategories', 'SubcategoryController');

    // Products
    // Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    // Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    // Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    // Route::resource('products', 'ProductController');


    // Addresses
    // Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    // Route::resource('addresses', 'AddressController');

    // Certificates
    // Route::delete('certificates/destroy', 'CertificateController@massDestroy')->name('certificates.massDestroy');
    // Route::resource('certificates', 'CertificateController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
