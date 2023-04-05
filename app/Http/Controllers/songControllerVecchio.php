<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\song;

class songControllerVecchio extends Controller
{
    public function songList(){
        $songs = Song::all();

        return view('homepage', compact('songs'));
    }
}
