<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $filedata = file_get_contents(database_path('/Data/User.json'));
        $details = json_decode($filedata);

        User::query()->truncate();



        foreach ($details as $detail){
            $admin = new User();

            $admin->firstName =  $detail->firstName;
            $admin->lastName = $detail->lastName;
            $admin->email = $detail->email;
            $admin->password =  bcrypt($detail->password);
            $admin->Title = $detail->Title;

            $admin->save();
        }


    }
}
