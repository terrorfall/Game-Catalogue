<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Gamelist;
use App\Platforms;

class FilterController extends Controller
{
    public function search() {
        $q = Input::get('q');
        $games = Gamelist::where("title", "like", "%$q%")->get();
        $resultType = 'Search';
        $platforms = Platforms::all()->sortBy('platform_neat');
        return view('results')->with(compact('games', 'resultType', 'platforms', 'q'));
    }

    public function filter() {
        $q = Input::get('q');
        $games = Gamelist::where("platform", "=", $q)->get();
        $resultType = 'Filter';
        $platforms = Platforms::all()->sortBy('platform_neat');
        return view('results')->with(compact('games', 'resultType', 'platforms', 'q'));
    }

    public function duplicates() {
        $games = Gamelist::where("copies", ">", "1")->get();
        $resultType = 'Duplicate';
        $platforms = Platforms::all()->sortBy('platform_neat');
        return view('results')->with(compact('games', 'resultType', 'platforms', 'q'));
    }
}
