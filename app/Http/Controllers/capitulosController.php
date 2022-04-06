<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\imagen;
use App\Models\capitulo;
use App\Models\serie;
use Illuminate\Support\Facades\Storage;

class capitulosController extends Controller
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
        $serie = $_POST['serie'];
        $numero = $_POST['numero'];

        $cargaCap = new capitulo;
        $cargaCap->numero = $numero;
        $cargaCap->series_id = $serie;
        $cargaCap->save();
        $capitulo = $cargaCap->id;

        if ($request->file('imagenes')) {

            $imagenes = $request->file('imagenes');

            $directorio = 'public/imagenes/' . $serie . '/' . $numero;

            foreach ($imagenes as $imagen) {

                $guardar = Storage::putFile($directorio, $imagen);
                $url = Storage::url($guardar);

                $cargaImagen = new imagen;
                $cargaImagen->url = $url;
                $cargaImagen->capituloId = $capitulo;
                $cargaImagen->save();
            }
        }

        return redirect()->back()->with('upload', 'Se elimino con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagenes = imagen::select('capitulos.id as capitulosId', 'imagens.url as url', 'capitulos.series_id as serie', 'capitulos.numero as numero', 'series.nombre as nombre')
            ->join('capitulos', 'capitulos.id', '=', 'imagens.capituloId')
            ->join('series', 'series.id', '=', 'capitulos.series_id')
            ->where('capitulos.id', '=', $id)
            ->get();

        $registro = $imagenes[0]->numero;
        $novela = $imagenes[0]->serie;

        $previous1 = $registro - 1;

        $previous = capitulo::where('numero', '=', $previous1)->where('series_id', '=', $novela)->get();

        $next1 = $registro + 1;

        $next = capitulo::where('numero', '=', $next1)->where('series_id', '=', $novela)->get();

        // dd($previous);

        return view('Capitulo', compact('imagenes', 'previous', 'next'));
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
