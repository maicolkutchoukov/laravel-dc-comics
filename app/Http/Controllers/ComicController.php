<?php
// Comando da eseguire:                                                                     php artisan make:controller ComicController  --resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Utilizzo i models
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'             => 'required|max:1024',
            'description'       => 'nullable|min:1|max:2048',
            'thumb'             => 'nullable|max:1024|url',
            'price'             => 'required|max:8',
            'series'            => 'required|max:256',
            'sale_date'         => 'required|max:4096',
            'type'              => 'nullable|max:4096',
            'artist'            => 'nullable|max:4096',
            'writers'           => 'nullable|max:4096',
        ]);
        /* $comicData = $request->all(); */
        $comic = Comic::create($validatedData);
        
        /* 
        $comic = new Comic();
        $comic->title = $comicData['title'];
        $comic->description = $comicData['description'];
        $comic->thumb = $comicData['thumb'];
        $comic->price = $comicData['price'];
        $comic->series = $comicData['series'];
        $comic->sale_date = $comicData['sale_date'];
        $comic->type = $comicData['type'];
        $comic->artists = $comicData['artists'];
        $comic->writers = $comicData['writers'];
        $comic->save(); */

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        /* $comic = Comic::findOrFail($id); */
        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $validatedData = $request->validate([
            'title'             => 'required|max:256',
            'description'       => 'nullable|min:1|max:2048',
            'thumb'             => 'nullable|max:1024|url',
            'price'             => 'required|max:8',
            'series'            => 'required|string|max:256',
            'sale_date'         => 'nullable|date',
            'type'              => 'nullable|string|max:64',
            'artist'            => 'nullable|string|max:2048',
            'writers'           => 'nullable|string|max:2048',
        ],[
            'title.required' => 'Il titolo è obbligatorio.',
            'title.max' => 'Il titolo non può essere più lungo di :max caratteri.',
            'description.max' => 'La descrizione non può essere più lunga di :max caratteri.',
            'thumb.url' => 'Il link dell\'immagine non è valido',
            'sale_date.date' => 'La data di vendita non è valida.',
            'type.max' => 'Il tipo non può essere più lungo di :max caratteri.',
            'artists.max' => 'La lista degli artisti non può essere più lunga di :max caratteri.',
            'writers.max' => 'La lista degli scrittori non può essere più lunga di :max caratteri.',
        ]);

        $comic->update($validatedData);

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
