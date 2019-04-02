<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;

class CmsArticle extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'cms_articles';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'biblio';
}
