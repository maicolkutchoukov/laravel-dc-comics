<?php
//                                                                                      php artisan make:seeder ComicSeeder
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// ------------------------------
// Utilizzo il model Comic
use App\Models\Comic;
// ------------------------------
class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   //truncate() serve a svuotare la classe 
        //prima di riempirla di nuovo
        Comic::truncate();      
        
        $comics_data = config("comic");

        foreach ($comics_data as $index => $single_comic) {
            $comic = new Comic();
            $comic->title = $single_comic['title'];
            $comic->description = $single_comic['description'];
            $comic->thumb = $single_comic['thumb'];
            $comic->price = $single_comic['price'];
            $comic->series = $single_comic['series'];
            $comic->sale_date = $single_comic['sale_date'];
            $comic->type = $single_comic['type'];
            $comic->artists = implode(', ', $single_comic['artists']);
            $comic->writers = implode(', ', $single_comic['writers']);
            $comic->save();
        }
    }
}
