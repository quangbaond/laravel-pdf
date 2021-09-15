<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;
class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::create([
            'name' => 'IT phần mềm',
            'slug' => 'it-phan-mem'
        ]);
        Profession::create([
            'name' => 'SEO marketing',
            'slug' => 'seo-marketing'
        ]);
    }
}
