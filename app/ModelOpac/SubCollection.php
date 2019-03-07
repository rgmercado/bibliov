<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class SubCollections extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'sub_collections';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';

    
}
