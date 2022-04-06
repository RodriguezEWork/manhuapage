<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\capitulo;
use App\Models\serie;

class seriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serie = serie::limit('10')->orderBy('created_at', 'DESC')->get();

        $nuevos = capitulo::limit('10')
            ->join('series', 'series.id', '=', 'capitulos.series_Id')
            ->select(
                'capitulos.numero as numero',
                'series.id as idSeries',
                'capitulos.id as capituloId',
                'series.nombre as nombreSerie',
                'series.linkImage as imagen'
            )
            ->whereIn('capitulos.id', function ($query) {
                $query->select(DB::raw('MAX(id)'))->from('capitulos')->groupBy('series_id');
            })
            ->orderBy('capitulos.created_at', 'DESC')
            ->get();

        return view('home', compact('serie', 'nuevos'));
    }

    public function catalogo()
    {

        $catalogo = serie::get();

        return view('catalogo', compact('catalogo'));
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
        $serie = serie::find($id);

        $capitulos = capitulo::where('series_id', '=', $id)->get();

        return view('serie', compact('serie', 'capitulos'));
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
