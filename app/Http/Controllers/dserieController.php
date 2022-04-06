<?php

namespace App\Http\Controllers;

use App\Models\serie;
use Illuminate\Http\Request;

class dserieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $series = serie::orderBy('created_at', 'desc')->paginate(10);

        return view('Dashboard.Series', compact('series'));
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

        $nombre = $request->nombre;
        $slug = $request->slug;
        $imagen = $request->imagen;
        $portada = $request->portada;
        $descripcion = $request->descripcion;

        $nuevo = new serie;
        $nuevo->nombre = $nombre;
        $nuevo->slug = $slug;
        $nuevo->descripcion = $descripcion;
        $nuevo->linkImage = $imagen;
        $nuevo->linkPortada = $portada;
        $nuevo->save();

        return redirect()->back()->with('subido', 'Se elimino con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
