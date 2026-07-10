<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;

class MediaController extends Controller
{
    public function index()
    {
        $photos = MediaItem::where('type', 'photo')->orderBy('order')->get();
        $videos = MediaItem::where('type', 'video')->orderBy('order')->get();
        $press = MediaItem::whereIn('type', ['communique', 'presse'])->orderByDesc('created_at')->get();

        return view('pages.media.index', compact('photos', 'videos', 'press'));
    }
}
