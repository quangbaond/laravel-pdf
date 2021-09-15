<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CvUser;
class CvUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = [
            [
                'name' => 'Tin học văn phòng',
                'content' => 'Sử dụng thành thạo các công cụ Word, Excel,Photoshop, figma'
            ],
            [
                'name' => 'Tin học văn phòng',
                'content' => 'Sử dụng thành thạo các công cụ Word, Excel,Photoshop, figma'
            ],

            
        ];
        $education = [
            [
                'start_date' => now(),
                'end_date' => now(),
                'education_title' => "Đại học FPT",
                'education_content' => "Công nghê thông tin"
            ],
            [
                'start_date' => now(),
                'end_date' => now(),
                'education_title' => "Đại học FPT",
                'education_content' => "Công nghê thông tin"
            ],
            
        ];
        $experience = [
            [
                'start_date' => now(),
                'end_date' => now(),
                'experience_title' => "Công ty Mcew-tech",
                'experience_content' => 'abcxyz'
            ],
            [
                'start_date' => now(),
                'end_date' => now(),
                'experience_title' => "Công ty Mcew-tech",
                'experience_content' => 'abcxyz'
            ],
            
        ];
        CvUser::insert([
            'cv_id' => 1,
            'user_id' => 1,
            'title' => 'Thực tập sinh',
            'slug' => 'Cv-NQB',
            'position' => 'Thực tập sinh',
            'target' => 'Áp dụng những kinh nghiệm về kỹ năng  và sự hiểu biết về khoa , ngành để trở thành một nhân viên  chuyên nghiệp, mang đến nhiều giá trị , lợi
            ích cho Công ty.
            Mong muốn được cống hiến năng lực để phát triển Công ty',
            'education' => json_encode($education),
            'experience' => json_encode($experience),
            'interests' => 'Chơi game và coding , thích sáng tạo, học ngôn ngữ mới, đọc tài liệu',
            'skill' => json_encode($skill)
        ]); 
    }
}
