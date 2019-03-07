<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Exemplair extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'exemplaires';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';

}
