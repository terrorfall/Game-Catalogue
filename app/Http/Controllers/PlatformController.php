<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Platforms;

class PlatformController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $platforms = Platforms::all()->sortBy("platform_neat");
        return view('platform', ['platforms' => $platforms]);
    }

    public function edit($id) {
        $platform = Platforms::find($id);
        return view('editPlatform', ['platform' => $platform]);
    }

    public function delete($id) {
        if(Platforms::destroy($id)) {
            return redirect('platforms')->with('status', 'Platform removed!');
        }
        else {
            return redirect('platforms')->with('status', 'Something went wrong');
        }
    }
}
