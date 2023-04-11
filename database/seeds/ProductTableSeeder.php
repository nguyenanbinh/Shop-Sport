<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Giày cỏ nhân tạo',
                'description' => 'Tốt',
                'quantity' => '20',
                'price' =>'200.000',
                'sale_id' => '1',
                'category_id' => '5',
                'brand_id' => '4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bộ Thể Thao',
                'description' => 'Tốt',
                'quantity' => '35',
                'price' =>'200.000',
                'sale_id' => '1',
                'category_id' => '6',
                'brand_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Áo Thể Thao',
                'description' => 'Tốt',
                'quantity' => '49',
                'price' =>'200.000',
                'sale_id' => '1',
                'category_id' => '8',
                'brand_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Product::insert($data);
    }
}
