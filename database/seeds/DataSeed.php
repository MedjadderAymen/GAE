<?php

use App\department;
use Illuminate\Database\Seeder;

class DataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        department::create([
            'name' => "stic",
        ]);
        department::create([
            'name' => "gl",
        ]);
        department::create([
            'name' => "si",
        ]);
        department::create([
            'name' => "rsd",
        ]);

        \App\searchDomain::create([
            'domain' => "D1",
        ]);
        \App\searchDomain::create([
            'domain' => "D2",
        ]);
        \App\searchDomain::create([
            'domain' => "D3",
        ]);
        \App\searchDomain::create([
            'domain' => "D4",
        ]);
    }
}
