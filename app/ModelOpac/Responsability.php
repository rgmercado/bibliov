<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Responsability extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'responsability';
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
    protected $primaryKey = 'responsability_notice';
    public $incrementing = false;

     /**
      * Get the route key for the model.
      *
      * @return string
      */
     public function getRouteKeyName()
     {
         return 'responsability_notice';
     }
    /**
     *Relacion con el modelo Notice
     * @return relacion
     *
     */
    public function notices(){
        return $this
            ->belongsTo('App\ModelOpac\Responsability','responsability_notice');
    }

    /**
     *Relacion con el modelo Author
     * @return relacion
     *
     */
    public function authors(){
        return $this
            ->belongsTo('App\ModelOpac\Author', 'responsability_author');
    }
}
