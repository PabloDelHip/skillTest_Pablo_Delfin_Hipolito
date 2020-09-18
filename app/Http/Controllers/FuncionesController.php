<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FuncionesAdmin;
use App\FuncionesUser;
use App\Movie;
use App\Seat;

class FuncionesController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('funciones.home');
    }

    public function crear()
    {
        $movies = Movie::all();
        $funciones = FuncionesAdmin::get();

        
        return view('funciones.crear',compact('movies', 'funciones'));
    }

    public function seleccionar()
    {
        $movies = Movie::all();
        $funciones = FuncionesAdmin::get();
        $funciones_users = FuncionesUser::get();                 
                                
                                
        
        $asientos = Seat::all();
        return view('funciones.seleccionar', compact('funciones','movies','asientos', 'funciones_users'));
    }

    public function crear_funcion(Request $request)
    {
        try {
            $funciones_admin = new FuncionesAdmin;
            $funciones_admin->movieId = $request->movieId;
            $funciones_admin->time = str_replace("/", "-", $request->time); ;
            $funciones_admin->location = $request->location;
            
            $funciones_admin->save();
            return \Redirect::route('crear')->with('message', '');
        } catch (RequestException $e) {
            return response()->json(['mesage' => "ocurrio un problema"]);
        }
        
    }

    public function infoFunciones($id_funcion)
    {
        $funcion = FuncionesAdmin::find($id_funcion);
        return view('ajax.resumen',compact('funcion'));
    }

    public function infoAsientos($id_asiento)
    {
        $asiento = Seat::find($id_asiento);
        return view('ajax.asiento',compact('asiento'));
    }

    public function guardarAsistencia(Request $request)
    {
        //dd($request->all());
        try {

            $funciones_user = new FuncionesUser;
            $funciones_user->userId = auth()->user()->id;
            $funciones_user->movieId = $request->movieId ;
            $funciones_user->seatId = $request->seatId;
            
            $funciones_user->save();
            return response()->json(['mesage' => "todo correcto"]);
        } catch (RequestException $e) {
            return response()->json(['mesage' => "ocurrio un problema"]);
        }
        
    }
}
