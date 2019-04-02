<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Noeud extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'noeuds';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';

    /**
     *Relacion con el modelo Category
     * @return relacion
     *
     */
    public function categories(){
        return $this
            ->hasMany('App/ModelOpac/Category')
            ->withTimestamps();
    }
    /**
     *Relacion con el modelo Thesaurus
     * @return relacion
     *
     */
    public function thesaurus(){
        return $this
            ->hasMany('App/ModelOpac/Thesaurus')
            ->withTimestamps();
    }
}
