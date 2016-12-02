<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //

    protected $table = 'docente';
    protected $primaryKey = 'docente_id';
    public $incrementing = false;
    public $timestamps = false;


    //protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'estado'];




}
