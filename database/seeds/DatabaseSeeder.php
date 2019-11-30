<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employee;
use App\Timecard;
use App\Report;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // USERS
        $x = new User;
        $x->name = 'John Smith';
        $x->email = 'john@test.com';
        $x->password = 'test1234';
        $x->save();

        $x = new User;
        $x->name = 'Jane Doe';
        $x->email = 'jane@test.com';
        $x->password = 'test1234';
        $x->save();

        $x = new User;
        $x->name = 'Jeremy Thompson';
        $x->email = 'jeremy@test.com';
        $x->password = 'test1234';
        $x->save();
        
        // EMPLOYEES
        $x = new Employee;
        $x->user_id = 1;
        $x->card_number = 'TMG-001-09062019';
        $x->save();

        $x = new Employee;
        $x->user_id = 2;
        $x->card_number = 'TMG-002-09062019';
        $x->save();


        // Employee [1] Timecards
        $x = new Timecard;
        $x->employee_id = 1;
        $x->time_in = '1572595200';
        $x->time_out = '1572624000';
        $x->total_time = '28800';
        $x->save();

        $x = new Timecard;
        $x->employee_id = 1;
        $x->time_in = '1572681600';
        $x->time_out = '1572710400';
        $x->total_time = '28800';
        $x->save();

        $x = new Timecard;
        $x->employee_id = 1;
        $x->time_in = '1572768000';
        $x->time_out = '1572796800';
        $x->total_time = '28800';
        $x->save();

        // Employee [2] Timecards
        $x = new Timecard;
        $x->employee_id = 2;
        $x->time_in = '1572595100';
        $x->time_out = '1572624000';
        $x->total_time = '28000';
        $x->save();

        $x = new Timecard;
        $x->employee_id = 2;
        $x->time_in = '1572681150';
        $x->time_out = '1572710400';
        $x->total_time = '28000';
        $x->save();

        $x = new Timecard;
        $x->employee_id = 2;
        $x->time_in = '1572768110';
        $x->time_out = '1572796800';
        $x->total_time = '28300';
        $x->save();
    }
}
