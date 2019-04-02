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
    public $condicion = '';

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
    public function publisherEd2()
    {
        return $this
            ->belongsTo('App\ModelOpac\Publisher', 'ed2_id');
    }
    /**
     *Relacion con el modelo Collection
     * @return relacion
     *
     */
    public function responsability()
    {
        return $this
            ->hasMany('App/ModelOpac/Notice');
    }
    /**
     *Relacion con el modelo Collection
     * @return relacion
     *
     */
    public function collection()
    {
        return $this
            ->belongsTo('App\ModelOpac\Collection', 'coll_id');
    }
    /**
     *Relacion con el modelo Collection
     * @return relacion
     *
     */
    public function authors()
    {
        return $this
            ->hasManyThrough(
                'App\ModelOpac\Author',
                'App\ModelOpac\Responsability',
                'responsability_notice',
                'author_id',
                'notice_id',
                'responsability_notice'
            );
    }
    /**
     *Relacion con el modelo Explnum
     * @return relacion
     *
     */
    public function explnum()
    {
        return $this
            ->hasOne('App\ModelOpac\Explnum', 'explnum_notice');
    }

    /**
     * tipoEjemplar : Genera el query para buscar el tipo de Ejemplar
     *  @param  [string] $query [consulta]
     * @param  [string] $type  [cadean de busqueda]
     * @return [string]        [cadean de busqueda
     */
    public function tipoEjemplar()
    {
        return $this->condicion = '
                    ->Select(\'notices.notice_id\', \'exemplaires.expl_typdoc\', \'docs_type.idtyp_doc\', \'docs_type.tdoc_libelle\')
                    ->leftJoin(\'exemplaires\', \'exemplaires.expl_notice\', \'=\', \'notices.notice_id\')
                    ->leftJoin(\'docs_type\', \'exemplaires.expl_typdoc\', \'=\', \'docs_type.idtyp_doc\')';

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
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeConsulta($query, $type)
    {
        return $query->where('notice_id', $type);
    }


}
