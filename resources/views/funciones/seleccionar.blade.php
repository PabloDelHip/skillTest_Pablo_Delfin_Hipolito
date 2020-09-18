@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Seleccionar Funcion de Cine
                    </button>
                </div>

                <div class="table-responsive" id="info_funciones_seleccionadas" style="padding: 0 30px;">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Función</th>
                            <th>Asiento</th>
                            <th>Hora</th>
                            <th>Ubicacion</th>
                        </thead>
                        <tbody>
                            @foreach ($funciones_users as $funcion)
                            <tr>
                                <td >{{ $funcion->id }}</td>
                                <td>{{ $funcion->funciones_admin->movie->name }}</td>                                
                                <td>{{ $funcion->seat->seat }}</td>
                                <td>{{ $funcion->funciones_admin->time }}</td>
                                <td>{{ $funcion->funciones_admin->location }}</td>
                            </tr>
                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear función de cine</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="col-5" style="overflow-y: scroll; height: 500px;">
                    <h4>1. Funciones Disponibles</h4>
                    @foreach ($funciones as $funcion)

                        <a href="#" class="info-funciones selec_funcion"  idMovie="{{ $funcion->id }}">
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
                    @endforeach
                </div>
                <div class="col-3" style="overflow-y: scroll; height: 500px;">
                    <h4>2. Asiento</h4>
                    @foreach($asientos as $asiento)
                    <a href="#" class="info-funciones selec_asiento" idAsiento="{{ $asiento->id }}">
                        <div class="card mt-2 mb-2">
                            <div class="card-body" >
                                <i class="fas fa-user"></i> {{ $asiento->seat }}
                            </div>
                        </div>
                    </a>

                    <input type="hidden" name="seatId" id="_seatId{{ $asiento->id }}">
                    @endforeach
                </div>
                <div class="col-4">
                    <h4>3. Resumen</h4>
                    <div id="info_boletos">

                    </div>
                    <div id="info_asientos">

                    </div>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <button type="button" id="guardar_asistencia" class="btn btn-primary">Confirmar</button>
                    <input type="hidden" id="guardar_funcion">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>
@endsection