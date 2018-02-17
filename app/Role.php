<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['rolename', 'role[]']; 
  

  public function users(){
  	return $this->belongsToMany('App\User','user_role','role_id','user_id');
  }

  public function hasAnyRole($roles){
  			if(is_array($roles)){
  				foreach($roles as $role){
  					if($this->hasRole($role)){
  						return true;
  					}
  				}
  			}else{
  				if($this->hasRole($roles)){
  						return true;
  			}
  }
  return false;
}

public function hasRole($role){
		
}
}