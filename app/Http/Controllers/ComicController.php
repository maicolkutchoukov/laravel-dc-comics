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

        $comicData = $request->all();
        $comic = Comic::create($comicData);
        
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
        $comicData = $request->all();

        // TODO: valido i dati, ma lo faremo in futuro

        $comic->update($comicData);

        // OPPURE

        // $comic->fill($comicData);
        // $comic->save();

        // $comic->src = $comicData['src'];
        // $comic->title = $comicData['title'];
        // $comic->type = $comicData['type'];
        // $comic->cooking_time = $comicData['cooking_time'];
        // $comic->weight = $comicData['weight'];
        // $comic->description = $comicData['description'];
        // $comic->save();

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
