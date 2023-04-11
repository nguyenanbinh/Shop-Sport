<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
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
                'name' => 'Admin',
                'description' => 'Quản lý website',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mod',
                'description' => 'Quản lý nội dung được admin cho phép',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Customer',
                'description' => 'Khách hàng',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Role::insert($data);
    }
}
