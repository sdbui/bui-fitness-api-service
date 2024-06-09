<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

abstract class Controller
{
    public function getSingle (string $id) {
        return User::findOrFail($id);
    }

    public function getAll (Request $req) {
        return User::get();
    }

    /**
     * TODO: Revisit this. Is this necessary or can we somehow inject query params 
     * similar to route params??
     */
    public function getQueryParams (Request $req) {
        return $req->query->all();
    }
}
