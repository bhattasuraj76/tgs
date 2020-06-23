<?php

namespace App\Http\Controllers\Backend\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Models\Log;
use App\Models\Setting;
use App\Models\Masterdata;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function __construct(Setting $setting)
    {
        $this->pageTitle = "Setting Management";
        $this->model = $setting;
        $this->redirectUrl = "admin/setting";
        $this->middleware('permission:view-settings, guard:employee')->only(['index']);
        $this->middleware('permission:edit-settings, guard:employee')->only(['update']);
    }

    public function index(Request $request)
    {
        $pageTitle = $this->pageTitle;
        $data = $this->model->first();
        if (empty($data)) $data = $this->insertSettingdata();
        $timezones = $this->getTimeZoneData();
        return view('backend.setting.setting', compact('data', 'timezones', 'pageTitle'));
    }

    public function update(UpdateSettingRequest $request, $id)
    {
        try {
            $setting = $this->model->find($id);
            if (empty($setting))  throw new Exception('Data not found');

            $data = $request->all();
            $setting->update($data);
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function getTimeZoneData()
    {
        $data  = json_decode(file_get_contents(storage_path('json/timezone.json')));
        $timezoneArray = [];
        foreach ($data as $value => $title) {
            $timezoneArray[] = $value;
        }
        return $timezoneArray;
    }

    public function insertSettingdata()
    {
        foreach (config('setting_seeder') as $key => $value) {
            $data[$key] = $value;
        }
        return $this->model->create($data);
    }

    public function generateSitemap()
    {
        try {

            ini_set('max_execution_time', 300);
            Artisan::call('sitemap:generate');
            Log::create([
                'subject' => 'Sitemap generated',
                'module' => 'Sitemap',
                'email' => auth()->guard('employee')->check() ?  auth()->guard('employee')->user()->email : 'N/A'
            ]);
            return redirect()->back()->withErrors(['alert-success' => 'Sitemap generated successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function backupDb()
    {
        try {
            ini_set('max_execution_time', 300);
            Artisan::call('backup:run', ['--only-db' => true]);
            Log::create([
                'subject' => 'Backup of database created',
                'module' => 'Database',
                'email' => auth()->guard('employee')->check() ?  auth()->guard('employee')->user()->email : 'N/A'
            ]);
            return redirect()->back()->withErrors(['alert-success' => 'Backup of database created successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }
}
