<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramasContactos extends Model
{
    protected $table = 'programa_contactos';

    protected $fillable = ['programa_id', 'idContacto'];
    public $timestamps = false;

    protected $with = ['persona','programas'];

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona', 'idContacto');
    }

    public function programas()
    {
        return $this->belongsTo('App\Models\Programas', 'programa_id');
    }

}
