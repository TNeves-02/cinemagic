<div class="container-movie" style="background-color: #272829;">
    <form method="GET" class="form-group" id="form-filter">
        <div class="input-group ">
            <select class="custom-select rounded" name="genero" id="inputGenero" aria-label="Genero">

                @foreach ($generos as $genero)

                <option value="">{{$genero->nome}}</option>
                @endforeach
            </select>

            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
            </div>
        </div>
    </form>
    <form method="GET" class="form-group" id="form-filter">
        <div class="input-group ">
            <select class="custom-select rounded" name="curso" id="inputCurso" aria-label="Curso">
                <!-- Como ordenar a data -->
                @foreach ($anos as $ano)
                <option value="">{{$ano->ano}}</option>
                @endforeach
            </select>

            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
            </div>
        </div>
    </form>
</div>