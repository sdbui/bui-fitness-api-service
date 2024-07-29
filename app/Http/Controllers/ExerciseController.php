<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

/*TODO: need to re-crawl and update exercises with:
    - exercise summary
    - exercise directions
*/

class ExerciseController extends Controller
{
    public function getExercises(Request $req) {
        $cols =  ['name','category','exercise_type', 'equipment_required','experience_level', 'url'];
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
        
        // $test = $query->with(['secondary_muscles' => function ($query) {
        //     $query->withPivot('name');
        // }]);
        // $t = json_encode($test->first());
        // error_log(print_r($t, true));

        // $first = $query->with('secondary_muscles')->first();
        // $json = json_encode($first);
        // error_log(print_r($json, true));
        // return $query->with('secondary_muscles')->first();
        $query = $query->with('secondary_muscles');
        return $query->paginate(15);
        // return $query->paginate(15, $cols);
    }

    public function getExercise(string $id) {
        $query = Exercise::select()->where('id', $id);
        return $query->first();
    }
}
