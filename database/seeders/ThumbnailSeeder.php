<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Exercise;


class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('/json/images.json');
        $exercises = json_decode($json, true);

        foreach($exercises as $exercise) {
            Exercise::query()->where('name', '=', $exercise['name'])->update(['thumbnail' => $exercise['thumbnail'] ?: '']);
            // Exercise::query()->updateOrCreate([
            //     'name'=>$muscle
            // ]);
        }
    }
}
