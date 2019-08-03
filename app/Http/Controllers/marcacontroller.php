<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

class marcacontroller extends Controller
{

 /**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Mercedes Apis",
 *     version="1.0.0"
 *   )
 * )
 */
/**



/**
 * @SWG\Get(
 *   path="/marca",
 *   tags={"Lista de Marca"},
 *   summary="Lista de marca",
 *   operationId="getCustomerRates",
 *   
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=406, description="not acceptable"),
 *   @SWG\Response(response=500, description="internal server error")
 * )
 *
 */



    public function index()
    {
        $marca=Marca::all();
        return response()->json(['Marca'=>$marca,'code'=>200]);
    }

     /**
     * @SWG\Post(
     *   path="/marca",
     *   tags={"Lista de Marca"},
     *   summary="Lista de marca",
     *   operationId="getCustomerRates 1",
     *   @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="ingresar marca",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=404, description="not found"),)
     * )
     *
     */


    
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

    /**
     * @SWG\Get(
     *   path="/marca/{id}",
     *   tags={"Lista de Marca"},
     *   summary="Obtener marca",
     *   operationId="getRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id de la marca",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="el id de marca no existe"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */




    
    public function show($id)
    {
        $marca= Marca::find($id);
        if((empty($marca))){
            return response()->json(['mensaje'=>'Marca no encontrada','code'=>'404']);
        }
        return response()->json(['marca'=> $marca,'code'=>'200']);
    }

    /**
     * @SWG\Put(
     *   path="/marca/{id}",
     *   tags={"Lista de Marca"},
     *   summary="actualizar marcas compartidas",
     *   operationId="sharedRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id de marcas",
     *     required=true,
     *     type="integer"
     *   ),
     *   *   @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="ingresar marca",
     *     required=true,
     *     type="string"
     *   ),
     *   
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="Auto no encontrado"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */








    
    public function update(Request $request, $id)
    {
        if(empty($request->descripcion) ) {

            return response()->json(['message'=>'El campo es requerido', 'code'=>'406']);
        }


        $marca=Marca
        ::find($id);
        if(empty($marca)){

                return response()->json(['message'=>'Marca no encontrada', 'code'=>'404']);
        }
        
        $marca->descripcion=$request->descripcion;
        
        $marca->save();
        return response()->json(['message'=>'Marca actualizada', 'code'=>'200']);
    
    }



    /**
     * @SWG\Delete(
     *   path="/marca/{id}",
     *   tags={"Lista de Marca"},
     *   summary="eliminar marca",
     *   operationId="deleteMarca",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar el id de la marca",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=204, description="Marca eliminada correctamente"),
     *   @SWG\Response(response=404, description="Marca no encontrada"),
     * )
     *
     */

   
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
