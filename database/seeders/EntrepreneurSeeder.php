<?php

namespace Database\Seeders;

use App\Models\Entrepreneur;

use Illuminate\Database\Seeder;

class EntrepreneurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entrepreneur::factory(10)->create();
    }
}
