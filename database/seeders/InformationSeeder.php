<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Information;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'user_id' => 1,
            'address' => '123',
            'gender' => 1,
            
        ]);
    }
}
