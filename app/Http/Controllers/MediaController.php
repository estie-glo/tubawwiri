<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use ZipArchive;

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

    /**
     * "Télécharger tout le kit de presse" — zippe à la volée tous les
     * documents type=presse qui ont un fichier réel (file_path non null).
     * Route cachée derrière @if($presse->contains(fn ($i) => $i->file_path))
     * dans la vue : n'est jamais atteinte tant qu'aucun document n'est
     * uploadé, mais reste prête dès que la Fondatrice en ajoute un via l'admin.
     */
    public function downloadPressKit(): BinaryFileResponse
    {
        $items = MediaItem::where('type', 'presse')->whereNotNull('file_path')->orderBy('order')->get();

        abort_if($items->isEmpty(), 404);

        $zipPath = storage_path('app/tmp-kit-presse-' . uniqid() . '.zip');
        $zip = new ZipArchive();
        $zip->open($zipPath, ZipArchive::CREATE);

        foreach ($items as $item) {
            $absolutePath = Storage::disk('public')->path($item->file_path);
            if (is_file($absolutePath)) {
                $zip->addFile($absolutePath, basename($item->file_path));
            }
        }

        $zip->close();

        return response()->download($zipPath, 'kit-presse-tubawwiri.zip')->deleteFileAfterSend(true);
    }
}
