<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

class marcacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca=Marca::all();
        return response()->json(['Marca'=>$marca,'code'=>200]);
    }

    
    public function store(Request $request)
    {
        if(empty($request->descripcion) ) {

            return response()->json(['message'=>'El campo es requerido', 'code'=>'406']);
        }

        $marca = new Marca();
        $marca->descripcion=$request->descripcion;
        
        $marca->save();
        return response()->json(['message'=>'Marca creado correctamente', 'code'=>'201']);
    }

    
    public function show($id)
    {
        $marca= Marca::find($id);
        if((empty($marca))){
            return response()->json(['mensaje'=>'Marca no encontrada','code'=>'404']);
        }
        return response()->json(['marca'=> $marca,'code'=>'200']);
    }

    
    public function update(Request $request, $id)
    {
        if(empty($request->descripcion) ) {

            return response()->json(['message'=>'El campo es requerido', 'code'=>'406']);
        }


        $marca=Marca::find($id);
        if(empty($marca)){

                return response()->json(['message'=>'Marca no encontrada', 'code'=>'404']);
        }
        
        $marca->descripcion=$request->descripcion;
        
        $marca->save();
        return response()->json(['message'=>'Marca actualizada', 'code'=>'200']);
    
    }

   
    public function destroy($id)
    {
        if(empty($id)) {

            return response()->json(['message'=>'el id es obligatorio', 'code'=>'406']);
        }


        $marca=Marca::find($id);
        if(empty($marca)){

                return response()->json(['message'=>'Marca no encontrada', 'code'=>'404']);
        }
        
        $marca->delete();

        return response()->json(['message'=>'Marca borrada', 'code'=>'200']);

    }
    
}
