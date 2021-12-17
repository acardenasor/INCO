<?php

namespace Database\Seeders;

use App\Models\Type_Entrepreneur;
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
        // \App\Models\User::factory(10)->create();
        $this->call(TypeEntrepreneursSeeder::class);
        $this->call(RoleSeeder::class);
        /*$this->call(UserSeeder::class);*/
        $this->call(CategorySeeder::class);
        /*$this->call(EntrepreneurSeeder::class);
        $this->call(InfluencerSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(Social_NetworkSeeder::class);*/
    }
}
