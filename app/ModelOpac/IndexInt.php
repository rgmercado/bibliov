<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexInt extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'indexint';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';
}
