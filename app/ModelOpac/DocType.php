<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class DocType extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'docs_type';
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
    protected $primaryKey = 'idtyp_doc';
    public $incrementing = false;

     /**
      * Get the route key for the model.
      *
      * @return string
      */
     public function getRouteKeyName()
     {
         return 'idtyp_doc';
     }
     /**
      * Relacion con el modelo Notice
      * @return relacion
      *
      */
    public function notice(){
        return $this
            ->hasMany('App/ModelOpac/Notice', 'typdoc');
    }
    /**
     *Relacion con el modelo exemplaires
     * @return relacion
     *
     */
    public function exemplaires(){
        return $this
            ->hasMany('App/ModelOpac/Exemplair', 'expl_typdoc');
    }

}
