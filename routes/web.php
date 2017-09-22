<?php
//Client
Route::group(['domain' => env('CLIENT_DOMAIN')], function() {
    Route::get('/', function () {
        return view('teacher.index');
    });

    Route::group(['namespace' => 'Client'], function () {
        Route::get('auth', 'Auth\SessionsController@index')->name('teacher.auth');
        Route::post('login', 'Auth\SessionsController@store')->name('teacher.login');
        Route::get('logout', 'Auth\SessionsController@logout')->name('teacher.logout');

        Route::post('avatar', 'Auth\ProfileController@updateAvatar');
        Route::post('background', 'Auth\ProfileController@updateBackground');
        Route::get('show/{teacher?}', 'Auth\ProfileController@show')->name('teacher.show');
        Route::post('update', 'Auth\ProfileController@updateProfile')->name('teacher.update');
        Route::post('password', 'Auth\PasswordController@store')->name('teacher.password.save');
        Route::post('password/email', 'Auth\PasswordController@postEmail')->name('teacher.password.email');
        Route::post('password/reset', 'Auth\PasswordController@postReset')->name('teacher.password.reset');
        Route::post('password/change', 'Auth\ProfileController@update')->name('teacher.password.change');
        Route::get('teachers', 'TeacherController@index');
        Route::group(['prefix' => 'notifications'], function () {
            Route::get('/', 'NotificationController@index');
            Route::post('clear', 'NotificationController@clear');
            Route::put('{notification}', 'NotificationController@update');
        });

        Route::group(['prefix' => 'activities'], function () {
            Route::get('{courseClass}', 'ActivityController@getActivitiesOfClass')
                ->name('activities.getActivitiesOfClass');
            Route::post('{courseClass}/comment', 'ActivityController@storeComment')
                ->name('admin.storeComment');
            Route::post('{courseClass}/comment/{comment}', 'ActivityController@updateComment')
                ->name('admin.updateComment');
            Route::post('{courseClass}/comment/{comment}/delete', 'ActivityController@deleteComment')
                ->name('admin.deleteComment');
        });
    });
});

//Admin
Route::group(['domain' => env('ADMIN_DOMAIN')], function() {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('auth', 'Auth\SessionsController@index')->name('admin.auth');
        Route::post('login', 'Auth\SessionsController@store')->name('admin.login');
        Route::get('logout', 'Auth\SessionsController@logout')->name('admin.logout');

        Route::post('password', 'Auth\PasswordController@store')->name('admin.password.save');
        Route::post('password/email', 'Auth\PasswordController@postEmail')->name('admin.password.email');
        Route::post('password/reset', 'Auth\PasswordController@postReset')->name('admin.password.reset');
        Route::post('password/change', 'Auth\ProfileController@update')->name('admin.password.change');
        Route::post('avatar', 'Auth\ProfileController@updateAvatar');
        Route::post('/', 'ProfileController@update');

        Route::get('users', 'DashboardController@getUsers')->name('admin.getUsers');

        Route::group(['prefix' => 'notifications'], function () {
            Route::get('/', 'NotificationController@index');
            Route::post('clear', 'NotificationController@clear');
            Route::put('{notification}', 'NotificationController@update');
        });

        Route::group(['prefix' => 'admins'], function () {
            Route::post('/search', 'AdminController@search')->name('admin.admin.search');
            Route::get('', 'AdminController@index')->name('admin.admin.index');
            Route::post('/', 'AdminController@store')->name('admin.admin.save');
            Route::group(['prefix' => '{admin}'], function () {
                Route::put('/status', 'AdminController@status');
                Route::put('/update-profile', 'AdminController@update')->name('admin.admin.update');
                Route::get('', 'AdminController@show');
            });
        });

    });
});
