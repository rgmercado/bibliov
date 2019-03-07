<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'series';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';
}
