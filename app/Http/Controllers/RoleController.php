<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests\{StoreRolRequest, UpdateRolRequest};
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolRequest $request)
    {
        $request->user()->authorizeRoles('admin');
        $rol = new Role();
        $rol->name = $request->input('name');
        $rol->descripcion = $request->input('descripcion');
        $rol->save();
        return redirect()->route('roles.index')->with('status', 'Creación Exitosa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $rol = Role::findOrFail($id);
        return view('roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $rol = Role::find($id);
        return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolRequest $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $rol = Role::find($id);
        $rol->name = $request->input('name');
        $rol->descripcion = $request->input('descripcion');
        $rol->save();
        return redirect()->route('roles.show', [$rol])->with('status','Rol Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        Role::destroy($id);
        return redirect()->route('roles.index');

    }
}
