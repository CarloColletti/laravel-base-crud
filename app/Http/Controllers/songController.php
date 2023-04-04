<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\song;

class songController extends Controller
{
    public function songList(){
        $songs = Song::all();

        return view('song-list', compact('songs'));
    }
}
