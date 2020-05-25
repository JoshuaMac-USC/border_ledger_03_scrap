<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->fname = "Joshua";
        $user->lname = "Macaldo";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("admin123");
        $user->dob = "1999-07-15";
        $user->is_admin = "1";
        $user->save();

        $user = new User();
        $user->fname = "Francis";
        $user->lname = "Tugonon";
        $user->email = "user@gmail.com";
        $user->password = Hash::make("useruser");
        $user->dob = "2000-01-26";
        $user->is_admin = "0";
        $user->save();
    }
}
