<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Campaigns extends Model
{
    protected $table = 'campaigns';

    public static function getAll(){
        return  DB::table('campaigns')->join('clientes', function ($join) {
            $join->on('campaigns.cliente_id', '=', 'clientes.id');
        })->join('plan_medios', function ($join) {
            $join->on('plan_medios.campaign_id', '=', 'campaigns.id');
        })->join('detalle_plan_medios', function ($join) {
            $join->on('detalle_plan_medios.idPlanMedio', '=', 'plan_medios.id');
        })->select('clientes.nombreComercial', 'campaigns.titulo', 'plan_medios.nombre', 'detalle_plan_medios.*')->get();
    }
}
