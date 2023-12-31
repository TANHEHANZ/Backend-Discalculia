<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retroalimentaciones;
use Illuminate\Support\Facades\DB; 

class RetroalimentcionesController extends Controller
{
    //se utiliza para obtener todos los registros de la tabla
    public function index()
    {
        return DB::select('SELECT r.id , r.retroalimentacion, j.nombre_juego
        FROM Retroalimentaciones r
        JOIN Juegos j ON r.id_juegos = j.id;
        ');
        return Retroalimentaciones::all();
    }
    //Esta función se utiliza para almacenar un nuevo dato en la base de datos
    public function store(Request $request)
    {
        $retro=new Retroalimentaciones();
        $retro->retroalimentacion=$request->retroalimentacion;
        $retro->id_juegos=$request->id_juegos;
        $retro->save();
        return $retro;
    }

    //Esta función se utiliza para actualizar el dato existente en la base de datos
    public function update(Request $request, $id)
    {
        $retro=new Retroalimentaciones();
        $retro->retroalimentacion=$request->retroalimentacion;
        $retro->id_juegos=$request->id_juegos;
        $retro->save();
        return $retro;
    }

    //Esta función se utiliza para eliminar el dato de la base de datos
    public function destroy($id)
    {
        return Retroalimentaciones::destroy($id);
    }
}