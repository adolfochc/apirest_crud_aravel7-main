<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlataformaClasificacion extends Model
{
    protected $table = 'plataforma_clasificacions';

    protected $fillable = ['descripcion', 'plataforma_id'];
    public $timestamps = false;

    protected $with = ['plataforma'];

    public function plataforma()
    {
        return $this->belongsTo('App\Models\Plataformas', 'plataforma_id');
    }
}
