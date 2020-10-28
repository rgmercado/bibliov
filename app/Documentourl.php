<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentourl extends Model
{
    protected $primaryKey = 'cota_doc'; // or null

    public $incrementing = false;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'cota_doc';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'urlp', 'urldoc', 'resumenes','resumenin',
    ];

}
