<?php

namespace Database\Seeders;

use App\Models\CvUser;
use App\Models\Education;
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
        $this->call(UserSeeder::class);
        $this->call(InformationSeeder::class);
        $this->call(CvSeeder::class);
        $this->call(CvUserSeeder::class); 
    }
}
