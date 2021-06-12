<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chef_formation = User::create([
            'name' => "ben ali",
            'email' => 'benali@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'chef_formation',
        ]);

        $chef_formation->headResponsable()->create([
            'responsibility'=> "chef formation"
        ]);

        $chef_department = User::create([
            'name' => "ben omar",
            'email' => 'benomar@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'chef_department',
        ]);

        $chef_department->headResponsable()->create([
            'responsibility'=> "chef department"
        ]);

        $admin = User::create([
            'name' => "benzin",
            'email' => 'benzin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $admin->admin()->create([]);


    }
}
