<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platforms extends Model
{
    protected $table = "platforms";

    public function getPlatforms() {
        $platforms = Platforms::all();
        return $platforms;
    }
    
}
