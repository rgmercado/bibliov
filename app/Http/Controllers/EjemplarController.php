<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Ejemplar,Documentourl};
use Illuminate\Support\Facades\DB;
use App\ModelOpac\{Author,Category,Collection,DocType,Exemplair,Explnum,IndexInt,Noeud,Notice,Publisher,Responsability,Serie,CmsDocument,thesaurus};

class EjemplarController extends Controller
{
     /**
      * Display una busqueda general desde la base de Datos del PBM
      *
      * @return \Illuminate\Http\Response
      */
    public function busquedaGral(Request $request)
    {
        $matriz_rel = array();
        $cad_buscar = $request['busquedaGral'];
        if (is_null($cad_buscar)) {
            $ejemplares = Notice::paginate(15);
        }else {
            if (Notice::buscar($cad_buscar)->exists()){
                $ejemplares = Notice::buscar($cad_buscar)->paginate(15);
            }else{
                $menssage = "Búsqueda sin ningun resultado";
            }
        }
        return view('doc.busquedagral', compact('ejemplares'));
    }

    /**
     * Display los datos del ejemplar y los enlaces a el docuemnto digital
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ejemplar = Notice::buscar($id)->first();
        dd($ejemplar);
        $typedoc = Notice::tipoEjemplar()->consulta($id)->get;
        $uri = Documentourl::find($id)->first();
        if (is_null($uri)) {
            $uri = new Documentourl();
        }
        return view('doc.show', compact('ejemplar', 'uri', 'typedoc' ));
    }
    /**
     * Displaylos resultado de la busqueda de ejemplares por ejemplares
     *
     * @param  Request $request
     * @return resultado busqueda
     */
    public function busquedaCollection(Request $request){

        //
    }

    /**
     * Displaylos resultado de la busqueda de ejemplares por autor
     *
     * @param  Request $request
     * @return resultado busqueda
     */
    public function busquedaAuthor(Request $request)
    {
        $buscar = $request['busquedaGral'];
        if (is_null($buscar)) {
            $resBuscar = Notice::all();

        }


    }





}
