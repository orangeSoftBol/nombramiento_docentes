<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nombramiento extends Model
{
    //
    protected $table = 'NOMBRAMIENTO';
    protected $primaryKey = 'nombramiento_id';
    //protected $fillable = ['codigo','nombre','facultad','carrera','departamento','diploma','titulo','fecha_nombramiento','fecha_solicitud','duracion'];
    //public $incrementing = false;
    public $timestamps = false;


    protected $fillable = ['nombramiento_id', 'nombre'];

    public function docente()
    {
        return $this->belongsTo('App\Docente','fk_docente');
    }
}
