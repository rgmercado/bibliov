<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'categories';
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
    protected $primaryKey = 'num_noeud';

    public $incrementing = false;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'num_noeud';
    }

    /**
     *Relacion con el modelo Collection
     * @return relacion
     *
     */
    public function notices(){
        return $this
            ->hasManyThrough(
                'App\ModelOpac\Notice',
                'App\ModelOpac\NoticeCategory',
                'num_noeud',
                'notice_id',
                'num_noeud',
                'notcateg_notice'
            );
    }
    /***********************************Scope locales de Category************************************/

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $titulo
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuscar($query, $titulo)
    {
        return $query->where('libelle_categorie', "LIKE", "%$titulo%")
                     ->where('langue','=', 'es_ES')
                     ->orderBy('libelle_categorie','asc');
    }
}
