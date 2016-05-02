<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Platforms;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $id = Auth::id();
        $platforms = Platforms::where('ownedby', '=', $id)->orderBy('platform_neat')->get();
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
