<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('/json/exercises.json');
        $exercises = json_decode($json, true);

        foreach($exercises as $exercise) {
            Exercise::query()->updateOrCreate([
                'category'=>$exercise['category'],
                'name'=>$exercise['name'],
                'target_muscle_group'=>$exercise['target_muscle_group'],
                'exercise_type'=>$exercise['exercise_type'],
                'equipment_required'=>$exercise['equipment_required'],
                'mechanics'=>$exercise['mechanics'],
                'force_type'=>$exercise['force_type'],
                'experience_level'=>$exercise['experience_level'],
                'secondary_muscles'=>$exercise['secondary_muscles'],
                'url'=>$exercise['url']
            ]);
        }
    }
}
