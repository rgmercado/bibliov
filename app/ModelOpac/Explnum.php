<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Explnum extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'explnum';
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
    protected $primaryKey = 'explnum_id';
    public $incrementing = false;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'explnum_id';
    }
    /**
     *Relacion con el modelo Notice
     * @return relacion
     *
     */
    public function notice()
    {
        return $this
            ->belongsTo('App/ModelOpac/Notice','explnum_notice');
    }
}
