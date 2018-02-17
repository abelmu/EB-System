<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Vehiclemovement extends Model
{
    use SoftDeletes;
    protected $fillable = ['platenumber','drivername',
    'initialkm','finalkm', 'startingtime', 
    'endtime','initialposition','finalposition','reqdepartment'
    ,'numberofpeople','package'];
}
