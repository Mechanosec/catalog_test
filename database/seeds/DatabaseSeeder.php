<?php

use App\Models\Model;
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
        Model::unguard();

        $this->call(ProductTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(PropertyValuesTableSeeder::class);
        $this->call(ProductPropertyTableSeeder::class);

        Model::reguard();
    }
}
