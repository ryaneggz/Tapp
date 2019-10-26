<?php

use Illuminate\Database\Seeder;

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

        $x = new User;
        $x->name = 'Mr. Test';
        $x->employee_id = '1';
        $x->email = 'test@test.com';
        $x->password = '$2y$10$Jj6Yiz7uljGHk.retaOaSud9vNR6Ks7udf1WA6u.jjEv4v6hS18ti';
        $x->save();

        $x = new User;
        $x->name = 'Mr. Test B';
        $x->employee_id = '2';
        $x->email = 'b-test@test.com';
        $x->password = '$2y$10$Jj6Yiz7uljGHk.retaOaSud9vNR6Ks7udf1WA6u.jjEv4v6hS18ti';
        $x->save();
    }
}
