<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allMusic()
    {
        $musics = Music::all();
        return response()->json([
            'status' => 'success',
            'music' => $musics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMusic(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:255',
            'artist_id' => 'integer',
        ]);

        $music = Music::create([
            'name' => $request->name,
            'path' => $request->path,
            'artist_id' => $request->artist_id,
        ]);

        return response()->json([
            'status' => 'success',
            'music' => $music
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editMusic(Request $request, $id)
    {
        $music = Music::findOrFail($id)->update([
            'name' => $request->name,
            'path' => $request->path,
            'artist_id' => $request->artist_id,
        ]);

        return response()->json([
            'status' => 'success',
            'music' => $music
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function showMusic($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function deleteMusic($id)
    {
        //
    }
}
