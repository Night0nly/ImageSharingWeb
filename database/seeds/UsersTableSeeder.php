<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=100;$i++){
            $user = new \App\User();
            $user->username = str_random(10);
            $user->email = str_random(5).'@night.com';
            $user->password = bcrypt('123456');
            $user->firstname = str_random(5);
            $user->lastname = str_random(5);
            $user->phone = "09999999999";
            $user->introduction = "i'm not exist";
            $user->save();
        }
    }
}
