@extends('../Layouts.app')
    
@section ('titulo', 'Dashboard-Series')

@section ('contenido')

<div class="container">
    <div class="table-header">
        <h1>Capitulos</h1>
        <div>
            <button><a href="#modal">Agregar</a></button>
        </div>
    </div>

    @if (\Session::has('delete'))

        <div class="w3-panel">
            <h1>Eiminado!</h1>
            <p>El capitulo se elimino correctamente.</p>
        </div>

    @endif

    @if (\Session::has('upload'))

        <div class="w3-panel2">
            <h1>Subido!</h1>
            <p>El capitulo se subio correctamente.</p>
        </div>

    @endif

    <table class="serie-class">
        <thead>
            <tr>
                <td width=10%>Numero</td>
                <td width=80%>Imagenes</td>
                <td width=10%>Acciones</td>
            </tr>
        </thead>
        <tbody>

        @foreach ($capitulos as $item)

            <tr>
                <td width=10% >{{ $item->numero }}</td>
                <td width=80% >
                    @foreach ($imagenes as $imagen)
                        @if ($imagen->capituloId == $item->id)
                            <img src="{{ $imagen->url }}" alt="" height="80px" width="50px">
                        @endif
                    @endforeach
                </td>
                <td width=10% class="acciones">
                    <a href=" {{ route('Capitulo.show', $item->id ) }} " class="see" target="_blank"><i class='bx bx-search-alt-2'></i></a>
                    <a href="/dashboard/serie/destroy/{{ $item->id }}" class="delete"><i class='bx bx-trash'></i></a>
                    {{-- <a href="#" class="update"><i class='bx bx-revision'></i></a> --}}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
<div style="margin-top: 2rem">

    <ul class="pagination" role="menubar" aria-label="Pagination">
        <li><a href="{{$capitulos->previousPageUrl()}}"><span><i class='bx bx-skip-previous'></i></span></a></li>
        @for($i=1;$i<=$capitulos->lastPage();$i++)
            <li><a href="{{$capitulos->url($i)}}">{{$i}}</a></li>
         @endfor
        <li><a href="{{$capitulos->nextPageUrl()}}"><span><i class='bx bx-skip-next'></i></span></a></li>
    </ul>

</div>



<div id="modal" class="modal">
    <div class="modal_container">
        <form id="crear-form" class="form-style-9" action="{{ route('Capitulo.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <ul>
                <li>
                    <input type="number" name="numero" id="numero" placeholder="numero" class="field-style field-full align-none">
                </li>
                <li>
                    <input type="file" name="imagenes[]" id="imagenes[]"  multiple accept="images/*" style="margin: auto">
                </li>
                <li>
                    <input id="serie" type="text" name="serie" class="field-style field-full align-none" value="{{ $series->id }}" hidden/>
                </li>
                <li>
                <input type="submit" value="Subir capitulo" />
                <a href="#general">Cerrar</a>
                </li>
            </ul>
        </form>
    </div>
</div>

{{-- <h1>Probando formulario</h1>
        
<form method="POST" action="{{ route('Capitulo.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="imagenes[]" id="imagenes[]"  multiple accept="images/*">

    <select name="serie" id="serie">
        <option value="{{ $series->id }}">{{ $series->nombre }}</option>
    </select>
    
    <input type="number" name="numero" id="numero" placeholder="numero">

    <button class="btn btn-info btn-lg btn-block" type="submit"> ENTRAR </button>

    <button type="reset">Borrar</button>


</form> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("document").ready(function(){
            setTimeout(function(){
                $("div.w3-panel").remove();
                $("div.w3-panel2").remove();
            }, 5000 ); // 5 secs
        });
    </script>

@endsection