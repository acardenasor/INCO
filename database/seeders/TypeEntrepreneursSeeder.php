<?php

namespace Database\Seeders;

use App\Models\Type_Entrepreneur;
use Illuminate\Database\Seeder;

class TypeEntrepreneursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Type_Entrepreneur();
        $type->name = 'Esthetic';
        $type->description = 'fashion, clothing, makeup, hair products';
        $type->save();

        $type2 = new Type_Entrepreneur();
        $type2->name = 'Food';
        $type2->description = 'Anything about food';
        $type2->save();

        $type3 = new Type_Entrepreneur();
        $type3->name = 'Sports';
        $type3->description = 'Anything about sports';
        $type3->save();

        $type4 = new Type_Entrepreneur();
        $type4->name = 'Technology';
        $type4->description = 'Anything about technology';
        $type4->save();

        $type5 = new Type_Entrepreneur();
        $type5->name = 'Home';
        $type5->description = 'Anything about home';
        $type5->save();
    }
}
