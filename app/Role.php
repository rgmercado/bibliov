<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     *Relacion con el modelo User
     * @return [type] [description]
     */
    public function users(){
        return $this
            ->belongsToMany('App/User')
            ->withTimestamps();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'descripcion',
    ];
}
