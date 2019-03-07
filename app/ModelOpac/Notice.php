<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'notices';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';


}
