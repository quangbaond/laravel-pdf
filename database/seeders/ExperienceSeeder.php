<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::create([
            'user_id' => 1,
            'start_experience' => now(),
            'end_experience' => now(),
            'description' => '123'
        ]);
    }
}
