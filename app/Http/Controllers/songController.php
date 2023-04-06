<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;

class songController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('term')){
            $term = $request->get('term');
            $songs = song::where('title', 'LIKE', "%$term%")->paginate(10)->withQueryString(); 
        }else{
            $songs = song::paginate(15);
        }
        
        // dd($songs);
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
// 1- procedura per salvare tutti i dati singolarmente 
        // $song = new song;
        // $song ->title = $data["title"];
        // $song ->album = $data["album"];
        // $song ->author = $data["author"];
        // $song ->editor = $data["editor"];
        // $song->length = '3.15';
        // $song->poster = 'https://picsum.photos/200/200';

        // $song->save();

// 2- se i data corrispondono con il tipo richiesto si usa un comando solo 
        // da sistemare 
        $song = new song;
        $song->fill($data);
        $song->length = '3.15';
        $song->poster = 'https://picsum.photos/200/200';
        $song->save();

        return redirect ()->route('songs.show', $song);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(song $song)
    {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
