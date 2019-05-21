<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $fillable = ['nombre', 'actividad' , 'inicio' , 'fin' , 'tiempo' , 'fecha' , 'terminado' , 'comentarios'];

}
