<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandTableSeeder extends Seeder
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
                'name' => 'Nike',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Adidas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Reebok',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Puma',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Under Armour',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kamito',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mizuno',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Prowin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Wika',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Brand::insert($data);
    }
}
