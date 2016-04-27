<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Platforms;
use App\Gamelist;

class EditController extends Controller
{
    public function updatePlatform() {
        $inputs = Input::all();
        $platform = Platforms::find($inputs['id']);

        $platform->platform_neat = $inputs['platform'];
        $platform->platform_id = $inputs['imgfolder'];

        if($platform->save()) {
            return redirect('platforms')->with('status', 'Platform edited!');
        }
        else {
            return redirect('platforms')->with('status', 'Something went wrong');
        }
    }

    public function updateGame() {
        $inputs = Input::all();
        $game = Gamelist::find($inputs['id']);

        $game->title = $inputs['title'];
        $game->platform = $inputs['platform'];
        $game->copies = $inputs['copies'];

        if($game->save()) {
            return redirect('/')->with('status', 'Platform edited!');
        }
        else {
            return redirect('/')->with('status', 'Something went wrong');
        }
    }
}
