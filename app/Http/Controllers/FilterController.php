<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Gamelist;

class FilterController extends Controller
{
    public function search() {
        $q = Input::get('q');
        $results = Gamelist::where("title", "like", "%$q%")->get();
        var_dump($results);
    }

    public function filter() {
        $q = Input::get('q');
        $results = Gamelist::where("platform", "=", $q)->get();
        var_dump($results);
    }

    public function duplicates() {
        $results = Gamelist::where("copies", ">", "1")->get();
        var_dump($results);
    }
}
