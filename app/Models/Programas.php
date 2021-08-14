<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    protected $table = 'programas';

    protected $fillable = ['nombre', 'medio_id'];
    public $timestamps = false;

    protected $with = ['medios'];

    public function medios()
    {
        return $this->belongsTo('App\Models\Medios', 'medio_id');
    }
}
