<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\{Documentourl,Documento};
use App\Http\Requests\StoreDocumenturlRequest;

class DocumentourlController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.S
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $request->user()->authorizeRoles('admin');
        $isdn_sg = str_replace("-","",$request->input('isbn_doc'));
        /*Verifica que el ejemplar del modelo Notice no tiene asociado archivo digital*/
        if (Documentourl::where('cota_doc', $isdn_sg )->exists()){
            return redirect()->route('doc.show', ['idnotice' =>$request->input('idnotice')])->with('status', 'Este documento Existe, debe utilizar la Opcion Actualizar!');
        }
        $form_request = null;
        if ($request->has("req_form")){
            $form_request = $request->input('req_form');
        }
        return view('doc.create', ['isbn' => $isdn_sg, 'formRequest' => $form_request, 'idnotice' =>$request->input('idnotice')]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumenturlRequest $request)
    {
        // $request->user()->authorizeRoles('admin');

        $docuri = new Documentourl();
        $docuri->cota_doc = $request->input('isbn');
        $docuri->resumenes = $request->input('resumenO');
        $docuri->resumenin = $request->input('resumenI');
        if ($request->hasFile('portada')) {
            $file = $request->file('portada');
            $name = $request->input('isbn').'.jpg';
            $file->move(public_path().'/docorigen/', $name);
            $urlp = '/docorigen/'.$name;
            $docuri->urlp = $urlp;
        }
        if ($request->hasFile('ejemplar')) {
            $file = $request->file('ejemplar');
            $name = $request->input('isbn').'.pdf';
            $file->move(public_path().'/docorigen/', $name);
            $urldoc = '/docorigen/'.$name;
            $docuri->urldoc = $urldoc;
        }
        $docuri->save();
        return redirect()->route('doc.show', ['idnotice' =>$request->input('idnotice')])->with('status', 'Creación Exitosa!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $docum_url = Documentourl::findOrFail($id);
        $form_request = null;
        if ($request->has("req_form")){
            $form_request = $request->input('req_form');
        }
        return view('doc.edit', ['formRequest' => $form_request, 'idnotice' =>$request->input('idnotice') ])->with('urlmodel', $docum_url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id_sg = str_replace("-","",$id);
        $docuri = Documentourl::findOrFail($id_sg);
        if ($request->has('req_form')){
            /* Valores para los resumenes*/
            if ($request->input('req_form') == 'resumen') {
                $docuri->resumenes = $request->input('resumenO');
                $docuri->resumenin = $request->input('resumenI');
            }
            /* Valores para portada y titulo*/
            if ($request->input("req_form") == 'doc') {

                if ($request->hasFile('portada')) {
                    $file = $request->file('portada');
                    $name = $request->input('isbn').'.jpg';
                    $file->move(public_path().'/docorigen/', $name);
                    $urlp = '/docorigen/'.$name;
                    $docuri->urlp = $urlp;
                }
                if ($request->hasFile('ejemplar')) {
                    $file = $request->file('ejemplar');
                    $name = $request->input('isbn').'.pdf';
                    $file->move(public_path().'/docorigen/', $name);
                    $urldoc = '/docorigen/'.$name;
                    $docuri->urldoc = $urldoc;
                }
            }
        $docuri->save();
        return redirect()->route('doc.show', ['idnotice' =>$request->input('idnotice')])->with('status', 'Actualización Exitosa!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){

        $id_sg = str_replace("-","",$id);
        $doc = Documentourl::findOrFail($id_sg);
        if ($doc->delete()) { // Borramos los archivos en el dicrectorio public\docorigen
            if (\File::exists($doc->urldoc) and (\File::exists($doc->urlp))){
                \File::delete($doc->urldoc, $doc->urlp);
            }else{
                abort(404);
            }
        };
        return redirect()->route('doc.show', ['idnotice' => $request->input('idnotice')])->with('status', 'Eliminación Exitosa!');

    }
}
