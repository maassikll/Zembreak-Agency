<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bill;
use App\Models\User;
use App\Models\Person;
use App\Models\Employe;
use App\Models\Project;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            //Person::factory(200)->create();
            //Employe::factory(50)->create();
            //Customer::factory(10)->create();
            //Service::factory(200)->create();
            //Project::factory(50)->create();
            //Bill::factory(100)->create();
            User::factory(5)->create();


    }


}       

    
    

