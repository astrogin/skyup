<?php

use Illuminate\Database\Seeder;
use App\House;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $table = app(House::class)->getTable();

        $values = "('The Victoria',374662,4,2,2,2),
            ('The Xavier',513268,4,2,1,2),
            ('The Como',454990,4,3,2,3),
            ('The Aspen',384356,4,2,2,2),
            ('The Lucretia',572002,4,3,2,2),
            ('The Toorak',521951,5,2,1,2),
            ('The Skyscape',263604,3,2,2,2),
            ('The Clifton',386103,3,2,1,1),
            ('The Geneva',390600,4,3,2,2)";

        $sql = "INSERT INTO $table (name, price, bedrooms, bathrooms, storeys, garages) VALUES $values";

        \Illuminate\Support\Facades\DB::insert($sql);

    }
}
