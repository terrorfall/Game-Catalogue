<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Platforms;
use Illuminate\Http\Request;

use App\Gamelist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gameData = new Gamelist();
        $games = $gameData->getGames();
        $platforms = Platforms::all()->sortBy('platform_neat');
        return view('home')->with(compact('games', 'platforms'));
    }

    public function edit($id) {
        $game = Gamelist::find($id);
        $platforms = Platforms::all();
        return view('editGame', compact('game', 'platforms'));
    }

    public function delete($id) {
        if(Gamelist::destroy($id)) {
            return redirect('/')->with('status', 'Game removed!');
        }
        else {
            return redirect('/')->with('status', 'Something went wrong');
        }
    }
}
