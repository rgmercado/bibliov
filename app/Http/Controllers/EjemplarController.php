<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documentourl;
use Illuminate\Support\Facades\DB;
use App\ModelOpac\{Author,Category,Collection,DocType,Exemplair,Notice,NoticeCategory,Publisher,Responsability};

class EjemplarController extends Controller
{
    /**
     * Display los datos del ejemplar y los enlaces a el docuemnto digital
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ejemplar = Notice::find("$id");
        $typedoc = DB::table('pmb3.notices')
                    ->Select('pmb3.notices.notice_id', 'pmb3.exemplaires.expl_typdoc', 'pmb3.docs_type.idtyp_doc', 'pmb3.docs_type.tdoc_libelle')
                    ->leftJoin('pmb3.exemplaires', 'pmb3.exemplaires.expl_notice', '=', 'pmb3.notices.notice_id')
                    ->leftJoin('pmb3.docs_type', 'pmb3.exemplaires.expl_typdoc', '=', 'pmb3.docs_type.idtyp_doc')
                    ->where('pmb3.notices.notice_id', $id)
                    ->get();
        $code_sg = str_replace("-","",$ejemplar->code);
        $uri = Documentourl::find($code_sg);
        if (is_null($uri)) {
            $uri = new Documentourl();
        }
        return view('doc.show', compact('ejemplar', 'uri', 'typedoc' ));
    }
     /**
      * Display una busqueda general desde la base de Datos del PBM
      *
      * @return \Illuminate\Http\Response
      */
    public function busquedaGral(Request $request)
    {
        $cad_buscar = $request['busquedaGral'];
        if (is_null($cad_buscar)) {
            $ejemplares = Notice::paginate(15);
        }else {
            if (Notice::buscar($cad_buscar)->exists()){
                $ejemplares = Notice::buscar($cad_buscar)->paginate(15);
            }else{
                return view('common.sinresultado');
            }
        }
        return view('doc.busquedagral', compact('ejemplares'));
    }
    /**
     * Displaylos resultado de la busqueda de ejemplares por colleciones
     *
     * @param  Request $request
     * @return resultado busqueda
     */
    public function busquedaColl(Request $request){

        $cad_buscar = $request['busquedaGral'];
        if (is_null($cad_buscar)) {
            $collections = Collection::paginate(7);
        }else {
            if (Collection::buscar($cad_buscar)->exists()){
                $collections = Collection::buscar($cad_buscar)->paginate(7);
            }else{
                return view('common.sinresultado');
            }
        }
        return view('doc.busquedacoll', compact('collections'));
    }
    /**
     * Displaylos resultado de la busqueda de ejemplares por Fecha de Publicacion
     *
     * @param  Request $request
     * @return resultado busqueda
     */
    public function busquedaFe(Request $request){

        $cad_buscar = $request['busquedaGral'];
        if (is_null($cad_buscar)) {
            $ejemplares = Notice::paginate(15);
        }else {
            if (Notice::buscarfe($cad_buscar)->exists()){
                $ejemplares = Notice::buscarfe($cad_buscar)->paginate(15);
            }else{
                return view('common.sinresultado');
            }
        }
        return view('doc.busquedafe', compact('ejemplares'));
    }

    /**
     * Displaylos resultado de la busqueda de ejemplares por autor
     *
     * @param  Request $request
     * @return resultado busqueda
     */
    public function busquedaAuthor(Request $request)
    {
        $cad_buscar = $request['busquedaGral'];
        if (is_null($cad_buscar)) {
            $authors = Author::paginate(7);
        }else {
            if (Author::buscar($cad_buscar)->exists()){
                $authors = Author::buscar($cad_buscar)->paginate(7);
            }else{
                return view('common.sinresultado');
            }
        }
        return view('doc.busquedauth', compact('authors'));
    }
    /**
     * Displaylos resultado de la busqueda de ejemplares por autor
     *
     * @param  Request $request
     * @return resultado busqueda
     */
    public function busquedaCateg(Request $request)
    {
        $cad_buscar = $request['busquedaGral'];
        if (is_null($cad_buscar)) {
            $categories = Category::where('langue','=', 'es_ES')->paginate(7);
        }else {
            if (Category::buscar($cad_buscar)->exists()){
                $categories = Category::buscar($cad_buscar)->paginate(7);
            }else{
                return view('common.sinresultado');
            }
        }
        return view('doc.busquedacat', compact('categories'));
    }
}
