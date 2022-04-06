@extends('Layouts.app')
    
@section ('titulo', 'Inicio')

@section ('contenido')

<div style="max-width: 1000px; margin: 4rem auto;">

    <h2><strong>{{ $imagenes[0]->nombre }} - {{ $imagenes[0]->numero }}</strong></h2>

    <div style="display: flex; justify-content: space-between; margin-bottom: 3rem;">

        <select name="" id="" style="border-radius: 10px; padding: 0.25rem 1rem; background-color: azure;" disabled>
            <option value="">Desactivado</option>
        </select>

        <div>
            @if( count($previous) )
                <a href=" {{ route('Capitulo.show',  $previous[0]->id ) }} "><i class="fa fa-arrow-left guias" aria-hidden="true"
                style="font-size: 20px; border-radius: 10px 0 0 10px;"></i></a>
            @endif
            <a href=" {{ $imagenes[0]->serie }} "><i class="fa fa-home guias" aria-hidden="true" style="font-size: 20px;"></i></a>
            @if( count($next) )
                <a href=" {{ route('Capitulo.show', $next[0]->id ) }} "><i class="fa fa-arrow-right guias" aria-hidden="true"
                style="font-size: 20px; border-radius: 0 10px 10px 0;"></i></a>
            @endif
        </div>

    </div>

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        @foreach ($imagenes as $item)
            <img src="{{ asset( $item->url )  }}" alt="" width="1000px" style=" max-width:100% ">
        @endforeach
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 1rem;">

        <select name="" id="" style="border-radius: 10px; padding: 0.25rem 1rem; background-color: azure;" disabled>
            <option value="">Desactivado</option>
        </select>

        <div>
            @if( count($previous) )
                <a href=" {{ route('Capitulo.show',  $previous[0]->id ) }} "><i class="fa fa-arrow-left guias" aria-hidden="true"
                style="font-size: 20px; border-radius: 10px 0 0 10px;"></i></a>
            @endif
            <a href=" {{ $imagenes[0]->serie }} "><i class="fa fa-home guias" aria-hidden="true" style="font-size: 20px;"></i></a>
            @if( count($next) )
                <a href=" {{ route('Capitulo.show', $next[0]->id ) }} "><i class="fa fa-arrow-right guias" aria-hidden="true"
                style="font-size: 20px; border-radius: 0 10px 10px 0;"></i></a>
            @endif
        </div>

    </div>
</div>

<div class="wrapper">

    <h2><strong>Series más vistas</strong></h2>

    <div class="cards">

        <figure class="card">

            <img src="https://hatsukimanga.com/app/img/portadas/28Aug2020201305107781.jpg" />

            <figcaption><a href="">Great Medical Saint</a><br>
            </figcaption>

        </figure>

        <figure class="card">

            <img src="https://hatsukimanga.com/app/img/portadas/27Aug2020160741Portada%20de%20forced.jpg" />

            <figcaption><a href="">Forced to be villain</a><br>
            </figcaption>

        </figure>

        <figure class="card">

            <img src="https://hatsukimanga.com/app/img/portadas/17Aug2020203325cult.jpg" />

            <figcaption><a href="">Cultivation Chat Group</a><br>
            </figcaption>

        </figure>

        <figure class="card">

            <img src="https://hatsukimanga.com/app/img/portadas/29Aug2020004619por.jpg" />

            <figcaption><a href="">Metropolitan Citys Ying Yang Miracle Doctor</a><br>
            </figcaption>

        </figure>

        <figure class="card">

            <img src="https://hatsukimanga.com/app/img/portadas/14May2021200826port-New.jpg" />

            <figcaption><a href="">The Supreme System</a><br>
            </figcaption>

        </figure>

    </div>

</div>

@endsection