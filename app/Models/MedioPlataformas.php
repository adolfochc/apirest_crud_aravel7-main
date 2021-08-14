<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedioPlataformas extends Model
{
    protected $table = 'medio_plataformas';

    protected $fillable = ['medio_id', 'idPlataformaClasificacion','valor'];
    public $timestamps = false;

    protected $with = ['medios', 'clasificaciones'];

    public function medios()
    {
        return $this->belongsTo('App\Models\Medios', 'medio_id');
    }

    public function clasificaciones()
    {
        return $this->belongsTo('App\Models\PlataformaClasificacion', 'idPlataformaClasificacion');
    }
}
