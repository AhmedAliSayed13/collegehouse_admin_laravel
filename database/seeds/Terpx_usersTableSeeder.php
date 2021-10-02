<?php

use Illuminate\Database\Seeder;

class Terpx_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(\App\Models\Terpx_user::class, $count)->create();
    }
}
