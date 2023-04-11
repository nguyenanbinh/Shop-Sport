<?php

use Illuminate\Database\Seeder;
use App\Status;
class StatusTableSeeder extends Seeder
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
                'name' => 'Pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Deleted',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cancel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ];
        Status::insert($data);
    }
}
