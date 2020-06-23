<?php


//auth routes
Route::namespace('Backend')->group(function () {
    Route::any('/admin/login', 'Auth\LoginController@handleLogin')->name('admin.login');
    Route::post('/admin/logout', 'Auth\LoginController@logout')->name('admin.logout');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'backend', 'as' => 'admin.'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::redirect('/dashboard', '/admin');

    //department routes
    Route::namespace('Department')->group(function () {
        Route::resource('department', 'DepartmentController')->except(['show', 'store', 'update']);
        Route::get('department/{department}/status', 'DepartmentController@changeStatus')->name('department.status.change');
        Route::get('department/{department}/{workingday}', 'DepartmentController@deleteSingleWorkingDay')->name('department.working_day.destroy');
        Route::post('department/validate', 'DepartmentController@ajaxValidateDepartment')->name('department.validate');
    });

    //department routes
    Route::namespace('Holiday')->group(function () {
        Route::resource('holiday', 'HolidayController')->except(['show']);
        Route::get('holiday/{holiday}/status', 'HolidayController@changeStatus')->name('holiday.status.change');
    });

    //token routes
    Route::namespace('Token')->group(function () {
        Route::resource('token', 'TokenController')->only(['index', 'show']);
        Route::get('token/{token}/delete', 'TokenController@destroy')->name('token.destroy');
        Route::get('token/{token}/status', 'TokenController@changeStatus')->name('token.status.change');
    });

    //page routes
    Route::namespace('Page')->group(function () {
        Route::resource('page', 'PageController')->except(['show']);
        Route::get('page/{page}/deleteSingleImage', 'PageController@deleteSingleImage')->name('page.image.destroy');
        Route::get('page/{page}/status', 'PageController@changeStatus')->name('page.status.change');
    });

    //setting  routes
    Route::namespace('Setting')->group(function () {
        Route::resource('setting', 'SettingController')->only(['index', 'update']);

        Route::get('generateSitemap', 'SettingController@generateSitemap')->name('sitemap.create');
        Route::get('backupDb', 'SettingController@backupDb')->name('db.backup');
    });

    //log routes
    Route::resource('log', 'Log\LogController')->only(['index', 'destroy']);

    //profile routes
    Route::any('password', 'Profile\ProfileController@changePassword')->name('password.change');

    //user, roles and permission routes
    Route::resource('permission', 'Permission\PermissionController')->only(['index', 'edit', 'update']);
    Route::resource('role', 'Role\RoleController')->except(['show']);
    Route::namespace('Employee')->group(function () {
        Route::resource('user', 'EmployeeController')->except(['show']);
        Route::get('user/{user}/deleteSingleImage', 'EmployeeController@deleteSingleImage')->name('user.image.destroy');
    });
});