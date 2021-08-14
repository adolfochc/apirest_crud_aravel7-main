<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plataformas extends Model
{
    protected $table = 'plataformas';

    protected $fillable = ['descripcion'];

    public $timestamps = false;
}
