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

        $request->validate([
            'title' => 'required|max:50|unique:songs',
            'album'=> 'required|max:50|unique:songs', 
            'author'=> 'required|max:50|unique:songs',
            'editor'=> 'required|max:50|unique:songs',
        ],[
            'title.required'=> 'Il titlo è obbligatorio',
            'album.required'=> "Il nome dell'album è obbligatorio",
            'author.required'=> "Il nome dell'autore è obbligatorio",
            'editor.required'=> "Il nome dell'editor è obbligatorio",

            'title.max'=> 'Il titolo non puo superare i 50 caratteri',
            'album.max'=> "L'album non puo superare i 50 caratteri",
            'author.max'=> "L'autore non puo superare i 50 caratteri",
            'editor.max'=> "L'editor non puo superare i 50 caratteri",

            'title.unique'=> 'titolo già esistente',
            'album.unique'=> 'album già esistente',
            'author.unique'=> 'autore già esistente',
            'editor.unique'=> 'editor già esistente',
        ]);

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
    public function edit(song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, song $song)
    {
        $request->validate([
            'title' => 'required|max:50|unique:songs,title,'.$song->id.' ',
            'album' => 'required|max:50|unique:songs,album,'.$song->id.' ', 
            'author' => 'required|max:50|unique:songs,author,'.$song->id.' ',
            'editor' => 'required|max:50|unique:songs,editor,'.$song->id.' ',
        ],[
            'title.required'=> 'Il titlo è obbligatorio',
            'album.required'=> "Il nome dell'album è obbligatorio",
            'author.required'=> "Il nome dell'autore è obbligatorio",
            'editor.required'=> "Il nome dell'editor è obbligatorio",

            'title.max'=> 'Il titolo non puo superare i 50 caratteri',
            'album.max'=> "L'album non puo superare i 50 caratteri",
            'author.max'=> "L'autore non puo superare i 50 caratteri",
            'editor.max'=> "L'editor non puo superare i 50 caratteri",

            'title.unique'=> 'titolo già esistente',
            'album.unique'=> 'album già esistente',
            'author.unique'=> 'autore già esistente',
            'editor.unique'=> 'editor già esistente',
        ]);

        $data = $request->all();

        $song->update($data);

        return redirect ()->route('songs.show', $song);
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
