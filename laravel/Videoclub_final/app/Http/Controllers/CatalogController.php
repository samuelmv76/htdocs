<?php

namespace App\Http\Controllers;

use App\Models\Pelis;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
   
	/*
	2- Método show
	3- Método edit
	 */

    public function getIndex()
    {
        return view('catalog.index', array('arrayPeliculas'=>$this->arrayPeliculas));
    }

    public function getShow()
    {
        
        $peliculas = Pelis::all();  

        // Pasar los datos a la vista
        return view('catalog.show', [
            'arrayPeliculas' => $peliculas
        ]);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

	public function getEdit($id)
    {
        // Obtener la película con el id proporcionado
        $pelicula = Pelis::find($id);  // Utilizamos find para buscar la película por su ID


        // Pasar el dato de la película a la vista
        return view('catalog.edit', [
            'pelicula' => $pelicula // Pasamos la película entera a la vista
        ]);
    }

    public function store(Request $request){
        if(!empty($request->title) && !empty($request->year) && !empty($request->director)){
           $p = new Pelis;
            $p -> title = $request->post('title');
            $p -> year = $request->post('year');
            $p -> director = $request->post('director');
            $p -> poster = $request->post('poster');
            $p -> synopsis = $request->post('sysnopsis');
            $p -> save();

        }
        return redirect()->route('catalogshow');
    }


}
?>