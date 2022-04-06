<?php

namespace App\Http\Controllers;

use App\Models\capitulo;
use App\Models\imagen;
use App\Models\serie;
use Illuminate\Http\Request;

class dcapController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = serie::find($id);

        $capitulos = capitulo::where('series_id', '=', $id)->orderBy('created_at', 'desc')->paginate(5);

        $imagenes = imagen::get();

        return view('Dashboard.Capitulos', compact('series', 'capitulos', 'imagenes'));
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
        imagen::where('capituloId', '=', $id)->delete();

        $capitulo = capitulo::find($id);

        $capitulo->delete();

        return redirect()->back()->with('delete', 'Se elimino con exito!');
    }
}
