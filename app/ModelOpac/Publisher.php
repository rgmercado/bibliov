<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'publishers';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';
    /**
     * Asignacion de Clave primaria para el ELOQUENT
     * @var [type]
     */
    protected $primaryKey = 'ed_id';
    public $incrementing = false;

     /**
      * Get the route key for the model.
      *
      * @return string
      */
     public function getRouteKeyName()
     {
         return 'ed_id';
     }
    /**
     *Relacion con el modelo Notice
     * @return relacion
     *
     */
    public function notices(){
        return $this
            ->hasMany('App/ModelOpac/Notice');
    }
}
