<?php

namespace App\ModelOpac;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * Asignacion de Clave primaria para el ELOQUENT
     * @var [type]
     */
    protected $primaryKey = 'notice_id';

    public $incrementing = false;
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'notice_id';
    }
    /**
     *Relacion con el modelo exemplaires
     * @return relacion
     *
     */
    public function exemplaires()
    {
        return $this
            ->hasMany('App\ModelOpac\Exemplair', 'expl_notice');
    }
    /**
     *Relacion con el modelo Publisher
     * @return relacion
     *
     */
    public function publisher()
    {
        return $this
            ->belongsTo('App\ModelOpac\Publisher', 'ed1_id');
    }
    public function publisher2()
    {
        return $this
            ->belongsTo('App\ModelOpac\Publisher', 'ed2_id');
    }
    /**
     *Relacion con el modelo Responsability
     * @return relacion
     *
     */
    public function responsability()
    {
        return $this
            ->hasMany('App\ModelOpac\Notice');
    }
    /**
     *Relacion con el modelo Collection
     * @return relacion
     *
     */
    public function collection()
    {
        return $this->belongsTo('App\ModelOpac\Collection', 'coll_id');
    }
    /**
     *Relacion con el modelo Collection
     * @return relacion
     *
     */
    public function authors(){
        return $this
            ->hasManyThrough(
                'App\ModelOpac\Author',
                'App\ModelOpac\Responsability',
                'responsability_notice',
                'author_id',
                'notice_id',
                'responsability_author'
            );
    }

    /***********************************Scope locales de notices************************************/

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $titulo
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuscar($query, $titulo)
    {
        return $query->where('tit1', "LIKE", "%$titulo%")->orderBy('tit1','asc');
    }
    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $titulo
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuscarfe($query, $titulo)
    {
        $cad = $this->extraerDate($titulo);
        return $query->whereYear('date_parution', $cad['op'], $cad['date'])->orderBy('date_parution','asc');
    }
    /*
    /**
     *  @function extraer la ano de busqueda y el operador
     * @return relacion
     *
     */
    public function extraerDate($cadbusq){

        $oper01 = array("=", ">", "<");
        $oper02 = array(">=", "<=");
        $op = substr($cadbusq, 0, 2);
        $op1 = substr($cadbusq, 0, 1);
        if (in_array("$op", $oper02)) {
            $fecha = substr($cadbusq, 2, 4);
        }elseif (in_array("$op1", $oper01)) {
            $op = $op1;
            $fecha = substr($cadbusq, 1, 4);
        }else {
            $op = "=";
            $fecha = substr($cadbusq, 0, 4);
        }
        return array('op' => $op, 'date' => $fecha );
    }

}
