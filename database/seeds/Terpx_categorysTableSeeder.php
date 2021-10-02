<?php

use Illuminate\Database\Seeder;

class Terpx_categorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        factory(App\Models\Terpx_category::class, $count)->create();
    }
}
