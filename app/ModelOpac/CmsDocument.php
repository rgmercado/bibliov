<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class CmsDocument extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'cms_documents';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';

}
