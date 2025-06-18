<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'akew.535240123@stu.untar.ac.id')->first();

        if ($user) {
            $grades = [
                [
                    'course_name' => 'Web Programming',
                    'semester' => '2023/2024-1',
                    'credit_hours' => 3,
                    'grade' => 'A',
                    'grade_point' => 4.0
                ],
                [
                    'course_name' => 'Database Systems',
                    'semester' => '2023/2024-1',
                    'credit_hours' => 3,
                    'grade' => 'A-',
                    'grade_point' => 3.7
                ],
                // Add more sample grades as needed
            ];

            foreach ($grades as $grade) {
                Grade::create([
                    'user_id' => $user->id,
                    'course_name' => $grade['course_name'],
                    'semester' => $grade['semester'],
                    'credit_hours' => $grade['credit_hours'],
                    'grade' => $grade['grade'],
                    'grade_point' => $grade['grade_point']
                ]);
            }
        }
    }
}