<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Platforms;
use App\Gamelist;

class AddController extends Controller
{

    public function game() {
        $platformData = new Platforms();
        $platforms = $platformData->getPlatforms();
        return view('addGame')->with('platforms', $platforms);
    }

    public function platform() {
        return view('addPlatform');
    }

    public function saveGame() {
        $gameData = new Gamelist();
        $inputs = Input::all();

        $gameData->platform = $inputs['platform'];
        $gameData->title = $inputs['title'];
        $gameData->copies = $inputs['copies'];
        $gameData->ownedby = Auth::id();


        if($gameData->save()) {
            return redirect('/')->with('status', 'Game added!');
        }
        else {
            return redirect('add/game')->with('status', 'Something went wrong');
        }
    }

    public function savePlatform() {
        $platformData = new Platforms();
        $inputs = Input::all();

        $platformData->platform_id = $inputs['imgfolder'];
        $platformData->platform_neat = $inputs['platform'];
        $platformData->ownedby = Auth::id();

        if($platformData->save()) {
            return redirect('platforms')->with('status', 'Platform added!');
        }
        else {
            return redirect('add/platform')->with('status', 'Something went wrong');
        }
    }
}
