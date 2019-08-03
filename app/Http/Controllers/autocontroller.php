<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Auto;

class autocontroller extends Controller
{
      /**
 * @SWG\Get(
 *   path="/auto",
 *   tags={"Lista de Auto"},
 *   summary="Lista de Auto",
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
        $auto=Auto::all();
        return response()->json(['Auto'=>$auto,'code'=>200]);
    }


     /**
     * @SWG\Post(
     *   path="/auto",
 *       tags={"Lista de Auto"},
 *       summary="Lista de Auto",
     *   operationId="getCustomerRates 1",
     *   @SWG\Parameter(
     *     name="idmarca",
     *     in="formData",
     *     description="ingresar id  marca",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="modelo",
     *     in="formData",
     *     description="ingresar modelo",
     *     required=true,
     *     type="string"
     *   ),
     *  @SWG\Parameter(
     *     name="placa",
     *     in="formData",
     *     description="ingresar placa",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="color",
     *     in="formData",
     *     description="ingresar color",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="precio",
     *     in="formData",
     *     description="ingresar precio",
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
     * @SWG\Get(
     *   path="/auto/{id}",
     *   tags={"Lista de Auto"},
     *   summary="Obtener Auto",
     *   operationId="getRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id del auto",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="el id de auto no existe"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */

    public function show($id)
    {
         $auto= Auto::find($id);
        if((empty($auto))){
            return response()->json(['mensaje'=>'Auto no encontrado','code'=>'404']);
        }
        return response()->json(['Auto'=> $auto,'code'=>'200']);
    }


    /**
     * @SWG\Put(
     *   path="/auto/{id}",
     *   tags={"Lista de Auto"},
     *   summary="actualizar autos compartidos",
     *   operationId="sharedRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id de autos",
     *     required=true,
     *     type="integer"
     *   ),
     *   *   @SWG\Parameter(
     *     name="idmarca",
     *     in="formData",
     *     description="ingresar id  marca",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="modelo",
     *     in="formData",
     *     description="ingresar modelo",
     *     required=true,
     *     type="string"
     *   ),
     *  @SWG\Parameter(
     *     name="placa",
     *     in="formData",
     *     description="ingresar placa",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="color",
     *     in="formData",
     *     description="ingresar color",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="precio",
     *     in="formData",
     *     description="ingresar precio",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="Auto no encontrado"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */


    
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
     * @SWG\Delete(
     *   path="/AUTO/{id}",
     *   tags={"Lista de Auto"},
     *   summary="eliminar Auto",
     *   operationId="deleteAuto",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar el id del auto",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=204, description="Auto eliminado correctamente"),
     *   @SWG\Response(response=404, description="Auto no encontrada"),
     * )
     *
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
