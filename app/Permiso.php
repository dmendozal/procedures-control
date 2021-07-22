<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permissions';
    
    /* public static function Contiene($item,$var){

      foreach($var as $pivot){
          if($item ==$pivot->id){
              return true;
          }
      }
      return false;
        
    } */
}
