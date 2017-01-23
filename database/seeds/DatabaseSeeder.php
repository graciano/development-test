<?php

use Illuminate\Database\Seeder;
use App\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
    }
}

class AdminTableSeeder extends Seeder
{

    public function run()
    {
        if(Admin::count() == 0){
            Admin::create([
                          'email' => 'admin@nasa.org',
                          'name' => 'Margaret Hamilton',
                          'password' => bcrypt('apolo11'),
                          ]);
        }
    }
}

