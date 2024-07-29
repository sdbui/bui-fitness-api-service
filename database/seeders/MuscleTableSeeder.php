<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Muscle;

class MuscleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('/json/muscles.json');
        $muscles = json_decode($json, true);
        foreach($muscles as $muscle) {
            Muscle::query()->updateOrCreate([
                'name'=>$muscle
            ]);
        }
    }
}
