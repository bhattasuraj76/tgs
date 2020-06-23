<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Employee;
use stdClass;

class ViewServiceProvider extends ServiceProvider
{
    public $data = [], $defalutTemplateVal = 1;
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //backend
        view()->composer('backend.*', function ($view) {
            $authUser = auth()->guard('employee')->check() ?
                Employee::where('email', auth()->guard('employee')->user()->email)->first()
                : new stdClass;

            $this->data = ['authUser' => $authUser];
            return $view->with($this->data);
        });

        //frontend
        view()->composer('frontend.*', function ($view) {
            $settings = $this->getSettings();
            $fMenus = $this->getFooterMenus();
            $nMenus = $this->getNavbarMenus();

            $this->data = ['settings' => $settings, 'footerMenus' => $fMenus, 'navbarMenus' => $nMenus];
            $this->loadWebsiteDefaults($settings);
            return $view->with($this->data);
        });
    }

    public function getNavbarMenus()
    {
        return \App\Models\Menu::where('location', 'navbar')
            ->orderBy('position', 'asc')
            ->get();
    }

    public function getFooterMenus()
    {
        return \App\Models\Menu::where('location', 'footer')
            ->orderBy('position', 'asc')
            ->get();
    }


    public function getSettings()
    {
        return  \App\Models\Setting::first();
    }

    public function loadWebsiteDefaults($settings)
    {
        $websiteDefaults = config('website_default');

        $this->data['primary_email'] = $settings && $settings->primary_email ? $settings->primary_email : $websiteDefaults['primary_email'];
        $this->data['secondary_email'] = $settings && $settings->secondary_email ? $settings->secondary_email : $websiteDefaults['secondary_email'];
        $this->data['postal_code'] = $settings && $settings->postal_code ? $settings->postal_code : $websiteDefaults['postal_code'];
        $this->data['address'] = $settings && $settings->address ? $settings->address : $websiteDefaults['address'];
        $this->data['site_name'] = $settings && $settings->site_name ? $settings->site_name : $websiteDefaults['site_name'];
        $this->data['company_name'] = $settings && $settings->company_name ? $settings->company_name : $websiteDefaults['company_name'];
        $this->data['site_owner'] = $settings && $settings->site_owner ? $settings->site_owner : $websiteDefaults['site_owner'];
        $this->data['phone1'] = $settings && $settings->phone1 ? $settings->phone1 : $websiteDefaults['phone1'];
        $this->data['mobile1'] = $settings && $settings->mobile1 ? $settings->mobile1 : $websiteDefaults['mobile1'];
        $this->data['time'] = $settings && $settings->office_time ? $settings->office_time : $websiteDefaults['office_time'];
        $this->data['meta_title'] = $settings && $settings->meta_title ? $settings->meta_title : $websiteDefaults['meta_title'];
        $this->data['meta_keywords'] = $settings && $settings->meta_keywords ? $settings->meta_keywords : $websiteDefaults['meta_keywords'];
        $this->data['meta_description'] = $settings && $settings->meta_description ? $settings->meta_description : $websiteDefaults['meta_description'];
        $this->data['facebook_link'] = $settings && $settings->facebook_link ? $settings->office_time : $websiteDefaults['facebook_link'];
        $this->data['twitter_link'] = $settings && $settings->twitter_link ? $settings->twitter_link : $websiteDefaults['twitter_link'];
        $this->data['instagram_link'] = $settings && $settings->instagram_link ? $settings->instagram_link : $websiteDefaults['instagram_link'];
        $this->data['youtube_link'] = $settings && $settings->youtube_link ? $settings->youtube_link : $websiteDefaults['youtube_link'];
        $this->data['pinterest_link'] = $settings && $settings->pinterest_link ? $settings->pinterest_link : $websiteDefaults['pinterest_link'];
        $this->data['linkedin_link'] = $settings && $settings->linkedin_link ? $settings->linkedin_link : $websiteDefaults['linkedin_link'];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
