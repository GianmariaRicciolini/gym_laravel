<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            // Genera una data casuale
            $date = $faker->dateTimeBetween('+0 days', '+1 year')->format('Y-m-d');

            // Genera un'ora di inizio casuale tra le 08:00 e le 17:00 con minuti e secondi a zero
            $start_hour = $faker->numberBetween(8, 17);
            $start_time = sprintf('%02d:00:00', $start_hour);

            // Genera un'ora di fine casuale tra l'ora di inizio e le 18:00 con minuti e secondi a zero
            $end_hour = $faker->numberBetween($start_hour + 1, 18);
            $end_time = sprintf('%02d:00:00', $end_hour);

            Course::create([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(3),
                'date' => $date,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'max_participants' => $faker->numberBetween(5, 30),
            ]);
        }
    }
}

