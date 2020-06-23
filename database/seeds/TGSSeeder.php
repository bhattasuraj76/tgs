<?php

use Illuminate\Database\Seeder;

class TGSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create departments
        $departments[0] = \App\Models\Department::create([
            'name' => 'राहदानी',

        ]);
        $departments[1]  = \App\Models\Department::create([
            'name' => 'नागरिकता',
        ]);


        
        $days = ['sunday', 'monday', 'tuesday', 'thursday', 'friday'];
        foreach ($departments as $depatment) {
            //create working days for each department
            foreach ($days as $key => $day) {
                \App\Models\WorkingDay::insert([
                    'day' => $day,
                    'department_id' => $depatment->id,
                    'office_start_time' => "09:00",
                    'office_end_time' => "17:00",
                    'break_start_time' => '11:30',
                    'break_end_time' => '13:00',
                    'allocation_time' => 30,
                    'max_quotas' => 20,
                    'position' => $key + 1,
                ]);
            }
        }

        //create tokens for departments
        for ($i = 0; $i <= 20; $i++) {
            \App\Models\Token::insert([
                'department_id' => $departments[rand(0, 1)]->id,
                'date' => date('Y-m-d', strtotime("tomorrow")),
                'time_slot' => '10:00 - 10:30',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@doe.com',
                'phone' => '9860536208',
            ]);
        }

        //create holidays 
        for ($i = 0; $i <= 20; $i++) {
            \App\Models\Holiday::insert([
                'date' => date('Y-m-d', strtotime("Friday this week")),
               'remarks' => 'National Holiday Day'
            ]);
        }
    }
}
