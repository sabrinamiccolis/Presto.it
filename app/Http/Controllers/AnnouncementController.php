<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Jobs\AddWatermarkImage;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::where('revised', true)->orderBy('created_at', 'desc')->paginate(12);
        // $announcements = Announcement::all();

        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'images.*' => 'image|max:3072',
        ]);


        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $newFileName = "announcements/{$announcement->id}";
                // Crea un record per ogni nuova immagine
                $newImage = $announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    new ResizeImage($newImage->path, 500, 500),
                    new AddWatermarkImage($newImage->id)
                ])->dispatch($newImage->id);

                // ResizeImage::withChain([new AddWatermarkImage($newImage->id)]);
            }
        }



        if (Auth::user()->role!='admin') { 

            $validatedData['revised']=null;
        }

        $announcement->update($validatedData);

        return redirect()->back()->with('success', __('ui.announcementEdited'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->back()->with('success', __('ui.announcementDeleted'));
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        // Salva l'ID dell'annuncio prima di eliminare l'immagine
        $announcementId = $image->announcement_id;

        // Elimina il file immagine e il record
        Storage::delete($image->path);
        $image->delete();

        // Verifica se ci sono altre immagini per questo annuncio
        if (Image::where('announcement_id', $announcementId)->count() == 0) {
            // Reindirizza a una pagina sicura se non ci sono altre immagini
            return redirect()->route('user.index')->with('success', __('ui.imageDeleted'));
        }

        return back()->with('success', __('ui.imageDeleted'));
    }
}
