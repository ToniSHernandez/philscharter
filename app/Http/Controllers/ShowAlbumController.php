<?php

namespace App\Http\Controllers;

use Facades\Facebook;

class ShowAlbumController extends Controller
{
    public function show($album_id)
    {
        $limit  = request('limit');
        $before = request('before');
        $after  = request('after');

        $photos = Facebook::albumPhotos($album_id, $limit, $before, $after);

        return view('StaticPages.photos', compact('photos'));
    }
}
