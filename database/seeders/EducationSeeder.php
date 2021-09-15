<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'user_id' => 1,
            'start_education' => now(),
            'end_education' => now(),
            'description' => '123'
        ]);
    }
}
