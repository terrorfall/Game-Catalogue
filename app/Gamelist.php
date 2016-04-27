<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamelist extends Model
{
    protected $table = "gamelist";

    /**
     * Show a list of all available games.
     *
     * @return Response
     */
    public function getGames()
    {
        $games = Gamelist::all();
        return $games;
    }

    public function getGamesByPlatform($platform) {
        $games = Gamelist::where('platform', '=', $platform)->get();
        return $games;

    }

    public function addGame($data) {
        //
    }
}
