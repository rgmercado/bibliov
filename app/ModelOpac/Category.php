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
     *Relacion con el modelo Noeud
     * @return relacion
     *
     */
    public function noeud(){
        return $this
            ->hasOne('App/ModelOpac/Noeud')
            ->withTimestamps();
    }

}
