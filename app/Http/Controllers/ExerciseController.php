<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

/*TODO: need to re-crawl and update exercises with:
    - exercise summary
    - exercise directions
    - exercise thumbnail (this is actually for getExercises)
*/

class ExerciseController extends Controller
{
    public function getExercises(Request $req) {
        $cols =  ['name','target_muscle_group','exercise_type', 'equipment_required','experience_level', 'url'];
        $params = $this->getQueryParams($req);
        $query = Exercise::query();
        $schema = Schema::getColumnListing('exercises');
        foreach($params as $key => $val) {
            if (in_array($key, $schema)){
                // does it matter if there are more than one???
                $args = explode(",", $val);

                $query = $query->whereIn($key, $args);
                // foreach($args as $arg) {
                //     $query = $query->orWhere($key, "=",$arg);
                // }

            }
        }
        error_log(print_r($query->toSql(),true));

        // return $query->paginate(15, $cols);
        return $query->paginate(15, $cols);
    }

    public function getExercise(string $id) {
        $query = Exercise::select()->where('id', $id);
        return $query->first();
    }
}
