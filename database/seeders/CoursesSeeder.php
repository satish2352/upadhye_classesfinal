<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Courses;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'course_name' => 'Crash course Batch',
                'is_active' => true,
            ]);
			
			
			Courses::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'course_name' => 'REPEATERS BATCH',
                'is_active' => true,
            ]);
			
			
			Courses::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'course_name' => 'REVISION BATCH',
                'is_active' => true,
            ]);
			
			Courses::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'course_name' => 'PROGRESSIVE BATCH',
                'is_active' => true,
            ]);
			
			
			Courses::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'course_name' => 'INTENSIVE BATCH',
                'is_active' => true,
            ]);
			
			
			Courses::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'course_name' => 'IIT - JEE BATCH',
                'is_active' => true,
            ]);
			
			Courses::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'course_name' => 'PROGRESSIVE BATCH',
                'is_active' => true,
            ]);
    }
}
