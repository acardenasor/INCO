<?php

namespace Database\Seeders;

use App\Models\Influencer;

use Illuminate\Database\Seeder;

class InfluencerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Influencer::factory(10)->create();
    }
}
