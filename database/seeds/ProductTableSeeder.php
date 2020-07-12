<?php

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];

        $now = Carbon::now()->toDateTimeString();
        for ($i = 1; $i <= 50; $i++) {
            $products[] = [
                'name' => 'Продукт' . $i,
                'price' => rand(0, 1000),
                'count' => rand(0, 1000),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        Product::insert($products);
    }
}
