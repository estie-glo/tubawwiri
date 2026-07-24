<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;

class MediaController extends Controller
{
    public function index()
    {
        $photos = MediaItem::where('type', 'photo')->orderBy('order')->get();
        $videos = MediaItem::where('type', 'video')->orderBy('order')->get();
        $communiques = MediaItem::where('type', 'communique')->orderBy('order')->get();
        $presse = MediaItem::where('type', 'presse')->orderBy('order')->get();

        return view('pages.media.index', compact('photos', 'videos', 'communiques', 'presse'));
    }
}
