<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Muscle;
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
        $json = Storage::disk('local')->get('/json/exercises_1.json');
        $exercises = json_decode($json, true);

        foreach($exercises as $exercise) {
            $exercise_entry = Exercise::query()->updateOrCreate([
                'category'=>$exercise['category'],
                'name'=>$exercise['name'],
                // 'target_muscle_group'=>$exercise['target_muscle_group'],
                'exercise_type'=>$exercise['exercise_type'],
                'equipment_required'=>$exercise['equipment_required'],
                'mechanics'=>$exercise['mechanics'],
                'force_type'=>$exercise['force_type'],
                'experience_level'=>$exercise['experience_level'],
                // 'secondary_muscles'=>$exercise['secondary_muscles'], // dont put in column... get from join on query
                'url'=>$exercise['url']
            ]);

            // also attach the secondary_muscles
            if ($exercise['secondary_muscles'][0] != 'none') {
                foreach($exercise['secondary_muscles'] as $muscle_name) {
                    // error_log(print_r('othertest: '.$muscle_name, true));
                    $mid = Muscle::select('id') ->where('name', $muscle_name)->first();
                    if (is_null($mid)) {
                        continue;
                    }
                    // error_log(print_r('test: '.$mid['id'],true));
                    $muscleid = $mid['id'];
                    $exercise_entry->secondary_muscles()->attach($muscleid);
                }
            }
        }
    }
}
