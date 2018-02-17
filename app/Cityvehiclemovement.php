<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cityvehiclemovement extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['platenumber', 'drivername', 
    'initialkm','finalkm','differencekm','movementdate','Maker','startingtime'
    ,'endtime','initialposition','finalposition','reqdepartment'
    ,'numberofpeople','package','totalkm'];

}
