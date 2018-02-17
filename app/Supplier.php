<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    //
    protected $fillable = ['suppliercode', 'suppliername', 
    'telno1','telno2','fax','pbox','city','woreda','Maker'];
}
