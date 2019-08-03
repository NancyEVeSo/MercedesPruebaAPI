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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->descripcion) ) {

            return response()->json(['message'=>'El campo es requerido', 'code'=>'406']);
        }

        $marca = new Marca();
        $marca->descripcion=$request->descripcion;
        
        $equipo->save();
        return response()->json(['message'=>'Marca creado correctamente', 'code'=>'201']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca= Marca::find($id);
        if((empty($marca))){
            return response()->json(['mensaje'=>'Marca no encontrada','code'=>'404']);
        }
        return response()->json(['Equipo'=> $equipo,'code'=>'200']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
