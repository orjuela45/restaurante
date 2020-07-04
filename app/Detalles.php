<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'detalles';
    protected $filltable = array('id','idRestaurante','numero', 'estado','created_at','updated_at');
}
