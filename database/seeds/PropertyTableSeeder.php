<?php

use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [];

        $now = Carbon::now()->toDateTimeString();
        for ($i = 1; $i <= 5; $i++) {
            $properties[] = [
                'name' => 'Свойствво' . $i,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        Property::insert($properties);
    }
}
