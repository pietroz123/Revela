<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Album;
use App\Photo;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validations
        request()->validate([
            'album-name' => 'string|required',
            'album-description' => 'string',
        ]);
        exit;

        /**
         * Gets request data
         */
        $user_id = auth()->user()->id;
        $album_description = request('album-description');
        $album_name = request('album-name');
        $photos = json_decode(request('fileuploader-list-files'));

        // Check if the number of photos is correct
        $max_number_photos = auth()->user()->subscription->plan->number_of_photos;

        if (count($photos) != $max_number_photos) {
            return redirect()->back()->withInput();
        }

        /**
         * Create Album
         */
        $album = new Album;
        $album->user_id = $user_id;
        $album->name = $album_name;
        $album->description = $album_description;
        $album->save();

        /**
         * Save photos on DB
         */
        foreach ($photos as $photo) {
            $p = new Photo;
            $p->path = $photo['file'];
            $p->save();
        }

        return redirect()->route('dashboard.minhas-memorias')->with('success', 'Álbum solicitado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
