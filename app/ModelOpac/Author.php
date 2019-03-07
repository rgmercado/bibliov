<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'authors';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';
}
