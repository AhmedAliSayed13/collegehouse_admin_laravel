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
         //$this->call(UsersTableSeeder::class);
        //$this->call(Terpx_categorysTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        //$this->call(TypesTableSeeder::class);
        //$this->call(AtteibuteTableSeeder::class);
        //$this->call(Terpx_usersTableSeeder::class);
        //$this->call(ImagesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
