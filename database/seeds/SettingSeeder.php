<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('setting_seeder') as $key => $value) {
            $data[$key] = $value;
        }

        \App\Models\Setting::create($data);
        
    }
}
