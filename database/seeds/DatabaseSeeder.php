<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Model\Product;

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
        $this->call(ProductTableSeeder::class);
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

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        //creating 30 random products
        $faker = Faker\Factory::create();
        for ($i=0; $i < 30; $i++) {
            Product::create([
                            'name' => $faker->word,
                            'description' => $faker->sentence(6, true),
                            'price' => $faker->randomFloat(2, 0, 5000),
                            'stock' => $faker->numberBetween(0, 1000),
                            ]);
        }
    }
}
