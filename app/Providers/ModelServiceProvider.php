<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Employee::observe(\App\Observers\EmployeeObserver::class);
        \App\Models\Role::observe(\App\Observers\RoleObserver::class);
        \App\Models\Permission::observe(\App\Observers\PermissionObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Menu::observe(\App\Observers\MenuObserver::class);
        \App\Models\Page::observe(\App\Observers\PageObserver::class);
        \App\Models\Setting::observe(\App\Observers\SettingObserver::class);
        \App\Models\Department::observe(\App\Observers\DepartmentObserver::class);
        \App\Models\Holiday::observe(\App\Observers\HolidayObserver::class);
        \App\Models\Token::observe(\App\Observers\TokenObserver::class);
    }
}
