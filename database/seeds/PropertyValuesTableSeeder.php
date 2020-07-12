<?php

use App\Models\PropertyValue;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PropertyValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyValues = [];

        $now = Carbon::now()->toDateTimeString();
        for ($i = 1; $i <= 5; $i++) {
            $propertyValues[] = [
                'value' => 'значение' . $i,
                'property_id' => rand(1, 5),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        PropertyValue::insert($propertyValues);
    }
}
