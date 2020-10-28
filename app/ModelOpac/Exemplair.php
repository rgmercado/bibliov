<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Exemplair extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'exemplaires';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';

    /**
     * Relacion con el modelo Notice
     * @return relacion
     *
     */
     /**
      * Asignacion de Clave primaria para el ELOQUENT
      * @var [type]
      */
     protected $primaryKey = 'expl_id';
     public $incrementing = false;

      /**
       * Get the route key for the model.
       *
       * @return string
       */
      public function getRouteKeyName()
      {
          return 'expl_id';
      }

    public function notice(){
        return $this
            ->belongsTo('App/ModelOpac/Notice', 'expl_notice');
    }
    /**
     *Relacion con el modelo DocType
     * @return relacion
     *
     */
    public function docType(){
        return $this
            ->belongsTo('App/ModelOpac/DocType','expl_typdoc');
    }

}
