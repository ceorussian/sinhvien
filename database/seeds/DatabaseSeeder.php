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
        DB::table('students')->insert([
            'name' => "Nguyen Van Phong",
            'gender' => 1,
            'class_id' => 1,
            'birthday' => "25-08-1995",
            'address' => "Quang Nam",
            'nation' => 1,
            'name_father' => "To Van Chen",
            'name_mother' => "Nguyen Thi Ngoc",
        ]);

        DB::table('classes')->insert([
            'name' => "14I3"
        ]);

        DB::table('subjects')->insert([
            'name' => "Toan"
        ]);

        DB::table('scores')->insert([
        	'student_id' => 1,
            'class_id' => 1,
            'step' => 1,
            'subject_id' => 1,
            'score_mieng' => 10,
            'score_15' => 5,
            'score_60' => 3,
            'score_last' => 2,
        ]);

        DB::table('users')->insert([
            'email' => "admin@gmail.com",
            'password' => bcrypt(123456)
        ]);
    }
}
