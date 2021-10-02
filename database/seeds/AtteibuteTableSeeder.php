<?php

use Illuminate\Database\Seeder;

class AtteibuteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(\App\Models\Terpx_attribute::class, $count)->create();
    }
}
