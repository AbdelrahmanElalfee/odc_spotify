<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allArtist()
    {
        $artists = Artist::all();
        return response()->json([
            'status' => 'success',
            'artists' => $artists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addArtist(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        $artist = Artist::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'image' => $request->image,
        ]);

        return response()->json([
            'status' => 'success',
            'artist' => $artist
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editArtist(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);

        $artist->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'image' => $request->image
        ]);

        return response()->json([
            'status' => 'success',
            'artist' => $artist
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function showArtist($id)
    {
        $artist = Artist::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'artist' => $artist
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function deleteArtist($id)
    {
        Artist::findOrFail($id)->delete();

        return response()->json([
            'status' => 'success',
            'msg' => 'Deleted Successfully'
        ]);
    }
}
