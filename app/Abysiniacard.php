<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Abysiniacard extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['platenumber', 'date', 
    'price','day','month','year','Maker'];
}
