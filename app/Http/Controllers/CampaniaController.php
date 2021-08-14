<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedioPlataformas;
use App\Models\ProgramasContactos;
use App\Models\Campaigns;
use App\Models\DetallePlanMedios;

class CampaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articulos = Articulo::all();
        //
        /* SELECT cli.nombreComercial as cliente,ca.titulo as campania,pla.nombre as plan FROM campaigns ca INNER JOIN
        clientes cli ON ca.cliente_id =  cli.id INNER JOIN plan_medios pla ON
        pla.campaign_id = ca.id INNER JOIN detalle_plan_medios de ON de.idPlanMedio = pla.id  */
        $json_array = [];
        $detalleCampanias = Campaigns::getAll();

        foreach ($detalleCampanias as $key => $value) {
            $platafromas = [];
            $contacto = ProgramasContactos::find($value->idProgramaContacto);

            $json_array[$key]["id"]=$value->id;
            $json_array[$key]["cliente"]=$value->nombreComercial;
            $json_array[$key]["campania"]=$value->titulo;
            $json_array[$key]["plan_medios"]=$value->nombre;
            $json_array[$key]["periodista"]=$contacto->persona->nombres." ".$contacto->persona->apellidos;
            $json_array[$key]["medio_programa"]=$contacto->programas->medios->nombre." / ".$contacto->programas->nombre;
            foreach (explode(",",$value->idsMedioPlataforma) as  $key_plataforma => $value_medios) {
                $medioplataforma = MedioPlataformas::find($value_medios);
                $platafromas[$key_plataforma]["platafroma_option"] = $medioplataforma->clasificaciones->plataforma->descripcion;
                $platafromas[$key_plataforma]["clasificacion_option"] = $medioplataforma->clasificaciones->descripcion.": ".$medioplataforma->valor;
            }
            $json_array[$key]["plataforma"] = $platafromas;
            $json_array[$key]["tipo_nota"]=$value->tipoNota == 1?"Nota":"Entrevista";
            $json_array[$key]["estado"]=$value->statusPublicado == 1 ? "Publicado":"No Publicado" ;

        }
        /* return $json_array; */
        return response()->json(
            [
                'code' => 200,
                'data' => ['rpt' => $json_array],
                'message' => 'Datos mostrar.',
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detalle = DetallePlanMedios::destroy($request->id);
        return $detalle;
    }
}
