<?php

namespace Database\Seeders;

use App\Models\Social_Network;

use Illuminate\Database\Seeder;

class Social_NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social_Network::factory(10)->create();
    }
}
