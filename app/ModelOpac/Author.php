<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'authors';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';

    /**
     * Relacion con el modelo DocType
     * @return relacion
     *
     */
     /**
      * Asignacion de Clave primaria para el ELOQUENT
      * @var [type]
      */
     protected $primaryKey = 'author_id';
     public $incrementing = false;

      /**
       * Get the route key for the model.
       *
       * @return string
       */
      public function getRouteKeyName()
      {
          return 'author_id';
      }

    /**
     * Relacion con el modelo Notice
     * @return relacion
     *
     */

    public function responsabilities(){
            return $this->hasMany('App/ModelOpac/Author');
    }
}
