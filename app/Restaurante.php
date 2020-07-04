<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table = 'restaurante';
    protected $filltable = array('id','nombre','descripcion','direccion','ciudad','foto','created_at','updated_at');
}
