<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productProperties = [];

        $now = Carbon::now()->toDateTimeString();
        for ($i = 1; $i <= 5; $i++) {
            $productProperties[] = [
                'product_id' => rand(1, 40),
                'property_id' => rand(1, 5),
                'property_value_id' => rand(1, 5),
            ];
        }

        DB::table('product_property')->insert($productProperties);
    }
}
