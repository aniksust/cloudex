<?php
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
//    Route::get('AuthController@policytermsandconditions', 'policy-terms-and-conditions')->name('policy-terms-and-conditions');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'roles'], 'block' => ['User']], function () {
        Route::group(['roles' => ['Author', 'Admin']], function () {
            Route::get('/', 'AdminController@index')->name('admin.index');
        });
        Route::group(['roles' => ['Author', 'Admin']], function () {
            Route::resource('products', 'ProductController');
            Route::resource('categories', 'CategoryController');
            Route::resource('brands', 'BrandController');
            Route::resource('mades', 'MadeController');
            Route::resource('reviews', 'ReviewController');
            Route::get('help', 'AdminController@help')->name('admin.help');
            Route::put('help', 'AdminController@helpupdate');
            Route::resource('subscribes', 'SubscribeController');

        });

    Route::group(['roles' => ['Author', 'Admin']], function () {
        Route::get('orders', 'OrderController@index')->name('author.index');
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('help', 'AdminController@help')->name('admin.help');
    });









    Route::group(['roles' => ['Admin']], function () {
        Route::resource('users', 'UserController');
        Route::resource('wishlists', 'WishlistController');
        Route::resource('purchased-commodities', 'PurchasedcommoditiesController');
        Route::get('roles', 'RoleController@index')->name('roles.index');
        Route::get('role/{id}', 'RoleController@show')->name('roles.show');
        Route::get('roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
        Route::put('roles/{id}', 'RoleController@update')->name('roles.update');
        Route::get('settings', 'AdminController@settings')->name('admin.settings');
        Route::put('settings', 'AdminController@settingsupdate');
    });
});
Route::namespace('Site')->group(function () {
    Route::get('/', 'SiteController@index')->name('site.index');

    Route::get('men', 'ProductController@men')->name('site.men');
    Route::get('men/{url}', 'ProductController@menview')->name('site.men-view')->where('url', '[\w\d\-\_]+');
    Route::get('men-category/{url}', 'CategoryController@men')->name('site.men-category')->where('url', '[\w\d\-\_]+');
    Route::get('men-brands/{url}', 'BrandController@men')->name('site.men-brands')->where('url', '[\w\d\-\_]+');

    Route::get('women', 'ProductController@women')->name('site.women');
    Route::get('women/{url}', 'ProductController@womenview')->name('site.women-view')->where('url', '[\w\d\-\_]+');
    Route::get('women-category/{url}', 'CategoryController@women')->name('site.women-category')->where('url', '[\w\d\-\_]+');
    Route::get('women-brands/{url}', 'BrandController@women')->name('site.women-brands')->where('url', '[\w\d\-\_]+');

    Route::get('kids', 'ProductController@kids')->name('site.kids');
    Route::get('kids/{url}', 'ProductController@kidsview')->name('site.kids-view')->where('url', '[\w\d\-\_]+');
    Route::get('kids-category/{url}', 'CategoryController@kids')->name('site.kids-category')->where('url', '[\w\d\-\_]+');
    Route::get('kids-brands/{url}', 'BrandController@kids')->name('site.kids-brands')->where('url', '[\w\d\-\_]+');

    Route::get('accessories', 'ProductController@accessories')->name('site.accessories');
    Route::get('accessories/{url}', 'ProductController@accessoriesview')->name('site.accessories-view')->where('url', '[\w\d\-\_]+');
    Route::get('accessories-category/{url}', 'CategoryController@accessories')->name('site.accessories-category')->where('url', '[\w\d\-\_]+');
    Route::get('accessories-brands/{url}', 'BrandController@accessories')->name('site.accessories-brands')->where('url', '[\w\d\-\_]+');

    Route::get('new', 'ProductController@new')->name('site.new');
    Route::get('brands', 'BrandController@brands')->name('site.brands');
    Route::get('trends', 'ProductController@trends')->name('site.trends');
    Route::get('sale', 'ProductController@sale')->name('site.sale');

    Route::get('category/{url}', 'CategoryController@category')->name('site.category')->where('url', '[\w\d\-\_]+');
    Route::get('brands/{url}', 'BrandController@brandsurl')->name('site.brandsurl')->where('url', '[\w\d\-\_]+');
    Route::get('products/{url}', 'ProductController@products')->name('site.products')->where('url', '[\w\d\-\_]+');

    Route::put('review/{id}', 'ProductController@review')->name('site.review')->where('id', '[\w\d\-\_]+');
    Route::put('wishlist/{id}', 'ProductController@wishlist')->name('site.wishlist')->where('id', '[\w\d\-\_]+');

    Route::get('cart', 'CartController@index')->name('cart.index');
    Route::post('cart/{product}', 'CartController@store')->name('cart.store');
    Route::delete('cart/{product}', 'CartController@destroy')->name('cart.destroy');
    Route::delete('emptycart', 'CartController@emptycart')->name('cart.emptycart');

    Route::get('checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
    Route::post('checkout', 'CheckoutController@store')->name('checkout.store');

    Route::get('contact', 'SiteController@contact')->name('site.contact');
    Route::put('contact', 'SiteController@contactpost');

    Route::get('help-faq', 'HelpController@faq')->name('site.help-faq');
    Route::get('help-men', 'HelpController@men')->name('site.help-men');
    Route::get('help-women', 'HelpController@women')->name('site.help-women');
    Route::get('help-kids', 'HelpController@kids')->name('site.help-kids');
    Route::get('help-accessories', 'HelpController@accessories')->name('site.help-accessories');
    Route::get('help-brands', 'HelpController@brands')->name('site.help-brands');

    Route::put('subscribe', 'SubscribeController@subscribe')->name('site.subscribe');

    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile/{id}/edit', 'ProfileController@updateedit');
    Route::get('profile/{id}/password', 'ProfileController@password')->name('profile.password');
    Route::put('profile/{id}/password', 'ProfileController@updatepassword');
    Route::get('profile/wishlist', 'ProfileController@wishlist')->name('profile.wishlist');
    Route::delete('profile/wishlist{id}', 'ProfileController@wishlistdestroy')->name('profile.wishlistdestroy');
    Route::get('profile/{id}/purchased-commodities', 'ProfileController@purchasedcommodities')->name('profile.purchased-commodities');
});
