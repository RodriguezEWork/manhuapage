@extends('Layouts.app')
    
@section ('titulo', 'Inicio')

@section ('contenido')

<div class="wrapper">

    <h2><strong>Ultimas Actualizaciones</strong></h2>

    <div class="cards">

        @foreach ($nuevos as $item)

            <figure class="card">

                <img src="{{ $item->imagen }}" />
    
                <figcaption><a href="serie/{{ $item->idSeries }}"> {{ $item->nombreSerie }}</a><br>
                    <a href=" {{ route('Capitulo.show', $item->capituloId ) }} " class="botonaso" style=" padding: 0 1rem; ">{{ $item->numero }}</a>
                </figcaption>
    
            </figure>

        @endforeach

    </div>

</div>

<div class="wrapper">

    <h2><strong>Ultimas Series</strong></h2>

    <div class="cards">

        @foreach ($serie as $item)

            <figure class="card">

                <img src="{{ $item->linkImage }}" />
    
                <figcaption><a href="serie/{{ $item->id }}">{{ $item->nombre }}</a><br>
                </figcaption>
    
            </figure>

        @endforeach

    </div>

</div>

@endsection

