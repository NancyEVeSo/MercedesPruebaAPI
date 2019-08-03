<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Auto;

class autocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auto=Auto::all();
        return response()->json(['Auto'=>$auto,'code'=>200]);
    }

   

    public function store(Request $request)
    {
         if(empty($request->modelo) || empty($request->placa)|| empty($request->color)||empty($request->precio)) {

            return response()->json(['message'=>'Todos los campos son requeridos', 'code'=>'406']);
        }

        $auto = new Auto();
        $auto->idmarca=$request->idmarca;
        $auto->modelo=$request->modelo;
        $auto->placa=$request->placa;
        $auto->color=$request->color;
        $auto->precio=$request->precio;
        
        $auto->save();
        return response()->json(['message'=>'auto creado correctamente', 'code'=>'201']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $auto= Auto::find($id);
        if((empty($auto))){
            return response()->json(['mensaje'=>'Auto no encontrado','code'=>'404']);
        }
        return response()->json(['Auto'=> $auto,'code'=>'200']);
    }

    
    public function update(Request $request, $id)
    {
        if(empty($request->idmarca) || empty($request->modelo) || empty($request->placa)|| empty($request->color)||empty($request->precio)) {

            return response()->json(['message'=>'Los campos son requeridos', 'code'=>'406']);
        }


        $auto=Auto::find($id);
        if(empty($request->modelo) || empty($request->placa)|| empty($request->color)||empty($request->precio)){

                return response()->json(['message'=>'Auto no encontrado', 'code'=>'404']);
        }
        
        $auto->idmarca=$request->idmarca;
        $auto->modelo=$request->modelo;
        $auto->placa=$request->placa;
        $auto->color=$request->color;
        $auto->precio=$request->precio;
        
        $auto->save();
        return response()->json(['message'=>'Auto actualizado', 'code'=>'200']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(empty($id)) {

            return response()->json(['message'=>'el id es obligatorio', 'code'=>'406']);
        }


        $auto=Auto::find($id);
        if(empty($auto)){

                return response()->json(['message'=>'Auto no encontrado', 'code'=>'404']);
        }
        
        $auto->delete();

        return response()->json(['message'=>'Auto borrado', 'code'=>'200']);

    }
}
