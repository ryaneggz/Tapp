<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employee;
use App\Timecard;
use App\Report;
use App\Admin;
use App\Summary;

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

        // --- MASTER USER ---
        $x = new User;
        $x->name = 'Ryan Eggleston';
        $x->email = 'ryan.eggleston@tmgcore.com';
        $x->password = '$2y$10$OKuy4gBLMyQf0aMNo5zw2OtR5kwpPB8FJRW6nmfL2esjpia/NM3JC';
        $x->save();

        $x = new Admin;
        $x->user_id = 1;
        $x->save();

        $x = new Employee;
        $x->user_id = 1;
        $x->card_number = 'TMG-001-09062019';
        $x->save();
        // --- MASTER USER ---

        // --- ADMIN USER ---
        $x = new User;
        $x->name = 'Admin';
        $x->email = 'admin@test.com';
        $x->password = '$2y$10$qZFbCsLhT5wwPvtDFNYp.OUI9pzKEc4Vyi7/D0hjIN7RetMD3U7aq';
        $x->save();

        $x = new Admin;
        $x->user_id = 2;
        $x->save();

        $x = new Employee;
        $x->user_id = 2;
        $x->card_number = 'ADM-002-11302019';
        $x->save();
        // --- ADMIN USER ---

        // --- EMPLOYEE USER ---
        $x = new User;
        $x->name = 'Employee';
        $x->email = 'employee@test.com';
        $x->password = '$2y$10$DoZnE0Q1OGqKrT60GTtyReheeIfQqTtdn//2QwcT9sILFx7AzmP6S';
        $x->save();

        $x = new Employee;
        $x->user_id = 3;
        $x->card_number = 'EMP-003-11302019';
        $x->save();
        // --- EMPLOYEE USER ---

        // --- USER ---
        $x = new User;
        $x->name = 'User';
        $x->email = 'user@test.com';
        $x->password = '$2y$10$VFQiTcw/AN.C6/lL4jVd7um9O6QaV2sjAWAwQ4fdal4UH4Ll5GPf.';
        $x->save();
        // --- USER ---

        // --- SUMMARY ---
        $x = new Summary;
        $x->employee_id = 1;
        $x->body = '<p>Lorem epsum this was the take and heres what happend</p>';
        $x->save();
       
        $x = new Summary;
        $x->employee_id = 2;
        $x->body = '<p>Lorem epsum this was the EMPLOYEE 2 happend</p>';
        $x->save();

        $x = new Summary;
        $x->employee_id = 3;
        $x->body = '<p>Lorem epsum this was EMPLOYEE 3 what happend</p>';
        $x->save();

        $x = new Summary;
        $x->employee_id = 1;
        $x->body = '<p>Lorem epsum this was the AGAIN on the 5th what happend</p>';
        $x->save();
        // --- SUMMARY ---


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
        $x->employee_id = 3;
        $x->time_in = '1572768110';
        $x->time_out = '1572796800';
        $x->total_time = '28300';
        $x->save();
    }
}
