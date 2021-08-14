<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medios extends Model
{
    protected $table = 'medios';

    protected $fillable = ['nombre'];

    public $timestamps = false;
}
