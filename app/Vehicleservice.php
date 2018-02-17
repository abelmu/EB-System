<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Vehicleservice extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['platenumber', 'gargename', 
    'servicesmade'];
}
