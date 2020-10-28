<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class NoticeCategory extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'notices_categories';
   /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';
}
