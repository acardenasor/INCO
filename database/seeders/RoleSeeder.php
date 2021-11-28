<?php

namespace Database\Seeders;

use App\Models\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        /*$role->id_role = 1;*/
        $role->name = 'entrepreneur';
        $role->save();

        $role2 = new Role();
        /*$role2->id_role = 2;*/
        $role2->name = 'influencer';
        $role2->save();
    }
}
