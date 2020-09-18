<h5> Selecciono la pelicula: </h5>
<a href="#" class="info-funciones">
        <div class="card mt-2 mb-2">
            <div class="card-body" >
                <i style="color: #28A745" class="fas fa-video"></i> {{ $funcion->movie->name }}
                <br>
                <i style="color: #DC3849" class="fas fa-clock"> Hora: </i> {{ $funcion->time }}
                <br>
                <i style="color: #21A1B8" class="fas fa-map-marker-alt"></i> Ubicación: {{ $funcion->location }}
            </div>
        </div>
    </a>
    <input type="hidden" name="movieId" id="_movieId{{ $funcion->id }}">