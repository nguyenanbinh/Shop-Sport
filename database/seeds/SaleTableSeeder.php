<?php

use Illuminate\Database\Seeder;
use App\Models\Sale;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title' => 'Giảm giá lớn cuối năm',
            'content' => 'Giảm giá sâu',
            'discount' => '20',
            'start_day' => '2020_11_30',
            'end_day' => '2020_12_30'
        ];
        Sale::insert($data);
    }
}
