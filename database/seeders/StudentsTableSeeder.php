<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        for ($i = 1; $i <= 10; $i++) {
            Student::create([
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstNameMale,
                'middle_name' => $faker->middleNameMale,
                'email' => $faker->unique()->safeEmail,
                'group_id' => $faker->numberBetween(2, 3),
                'quote_type_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(70, 100),
                'entrance_exam_results' => $faker->numberBetween(70, 100),
                'average_exam_score' => $faker->randomFloat(1, 3, 5),
                'average_subject_score' => $faker->randomFloat(1, 3, 5),
                'entrance_test_results' => $faker->numberBetween(70, 100),
                'is_disabled' => $faker->boolean,
                'additional_score' => $faker->numberBetween(0, 5),
            ]);
        }

        // Добавьте другие записи по аналогии
    }
}
