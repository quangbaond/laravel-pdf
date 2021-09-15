<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cv;
class CvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Cv::create([
        'title' => 'CV đen',
        'slug' => 'cv-den',
        'profession_id' => 1,
      ]);
      Cv::create([
        'title' => 'cv-trang',
        'slug' => 'cv-trang',
        'profession_id' => 2
      ]);
    }
}
