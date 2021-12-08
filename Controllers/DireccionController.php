<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;


class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $direccion=DB::table('dirección as dir')->join('datos_personales as dp','dp.Cod_Personal','=','dir.Cod_Personal')
            ->select('dir.Cod_Direccion','dp.Nombres','dp.Apellido_Paterno','dp.Apellido_Materno','dir.Departamento','dir.Municipio','dir.Ciudad','dir.Zona','dir.Calle_Avenida','dir.Nro_Vivienda') 
            ->where('dp.Apellido_Paterno','LIKE','%'.$query.'%')
            ->orderBy('Cod_Direccion','desc')
                ->paginate(7);
                return view('direccion.index',["dirección"=>$direccion,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $direccion=new Direccion;
        $direccion->Cod_Personal=$request->input('Cod_Personal');
        $direccion->Departamento=$request->input('Departamento');
        $direccion->Municipio=$request->input('Municipio');
        $direccion->Ciudad=$request->input('Ciudad');
        $direccion->Zona=$request->input('Zona');
        $direccion->Calle_Avenida=$request->input('Calle_Avenida');
        $direccion->Nro_Vivienda=$request->input('Nro_Avenida');
        $direccion->save();
        return redirect()->route('direccion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit($Cod_Direccion)
    {
        //
        $direccion=Direccion::findOrFail($Cod_Direccion);
        $personal=DB::table('datos_personales')->where('Cod_Personal')->get();

        //return view("perfil.edit",compact('registro'));
        return view("direccion.edit",["Direccion"=>$direccion,"datos_personales"=>$personal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Cod_Direccion)
    {
        //
        $direccion=new Direccion;
        $direccion->Cod_Personal=$request->input('Cod_Personal');
        $direccion->Departamento=$request->input('Departamento');
        $direccion->Municipio=$request->input('Municipio');
        $direccion->Ciudad=$request->input('Ciudad');
        $direccion->Zona=$request->input('Zona');
        $direccion->Calle_Avenida=$request->input('Calle_Avenida');
        $direccion->Nro_Vivienda=$request->input('Nro_Avenida');
        $direccion->update();
        return redirect()->route('direccion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($Cod_Direccion)
    {
        //
        $direccion=Direccion::findOrFail($Cod_Direccion);
        $direccion->delete();
        return redirect()->route('direccion.index');
    }
}
