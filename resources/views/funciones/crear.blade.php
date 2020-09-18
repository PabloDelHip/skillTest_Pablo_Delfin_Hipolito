@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            Crear Funciones de Cine
                        </button>
                    </div>

                    <div class="table-responsive" style="padding: 0 30px;">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Hora</th>
                                <th>Ubicación</th>
                            </thead>
                            <tbody>
                                @foreach ($funciones as $funcion)
                                <tr>
                                    <td >{{ $funcion->id }}</td>
                                    <td>{{ $funcion->movie->name }}</td>
                                    <td>{{ $funcion->time }}</td>
                                    <td>{{ $funcion->location }}</td>
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
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear función de cine</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="frmCrearFuncion" action="crear-funcion">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccionar pelicula</label>
                <select class="form-control" name="movieId" id="exampleFormControlSelect1" required>
                  <option value=""></option >
                  @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccionar horario</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="time" class="form-control" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <input type='text' name="location" class="form-control"  id="direccion_map" readonly/>
                <div class="card-body">
                    <div id ="map"> </div> 
                </div>
            </div>
            <input type="hidden" id="direccion" name="location">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="guardar_funcion" class="btn btn-primary">Guardar función</button>
        </div>
      </div>
    </div>
  </div>
@endsection