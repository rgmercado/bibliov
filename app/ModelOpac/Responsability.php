<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsability extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'responsability';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';
}
}
