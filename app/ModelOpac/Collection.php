<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'collections';
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
    protected $primaryKey = 'collection_id';
    public $incrementing = false;

     /**
      * Get the route key for the model.
      *
      * @return string
      */
     public function getRouteKeyName()
     {
         return 'collection_id';
     }

    /**
     *Relacion con el modelo Notice
     * @return relacion
     *
     */
    public function notices(){
        return $this
            ->hasMany('App\ModelOpac\Notice','coll_id');
    }
    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $titulo
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuscar($query, $titulo)
    {
        return $query->where('collection_name', "LIKE", "%$titulo%")->orderBy('collection_name','asc');
    }
}
