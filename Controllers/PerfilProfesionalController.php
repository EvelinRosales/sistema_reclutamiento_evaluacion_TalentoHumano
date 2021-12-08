<?php

namespace App\Http\Controllers;

use App\Models\Perfil_Profesional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class PerfilProfesionalController extends Controller
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
            $profesional=DB::table('perfil_profesional as pf')->join('datos_personales as dp','dp.Cod_Personal','=','pf.Cod_Personal')
            ->select('pf.Cod_Perfil','dp.Nombres','dp.Apellido_Paterno','dp.Apellido_Materno','pf.Titulo','pf.Especialidad','pf.Experiencia_Laboral','pf.Cargo','pf.Otros') 
            ->where('pf.Titulo','LIKE','%'.$query.'%')
            ->orwhere('dp.Apellido_Paterno','LIKE','%'.$query.'%')
            ->orderBy('Cod_Perfil','desc')
                ->paginate(4);
                return view('perfil.index',["perfil_profesional"=>$profesional,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal=DB::table('datos_personales')->where('Cod_Personal')->get();
        
        return view("perfil.create",["lista_personal"=>$personal]);
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
        $perfil=new Perfil_Profesional;
        $perfil->Cod_Personal=$request->input('Cod_Personal');
        $perfil->Titulo=$request->input('Titulo');
        $perfil->Especialidad=$request->input('Especialidad');
        $perfil->Experiencia_Laboral=$request->input('Experiencia_Laboral');
        $perfil->Cargo=$request->input('Cargo');
        $perfil->Otros=$request->input('Otros');
        $perfil->save();
        return redirect()->route('perfil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil_Profesional  $perfil_Profesional
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil_Profesional $perfil_Profesional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil_Profesional  $perfil_Profesional
     * @return \Illuminate\Http\Response
     */
   
    public function edit($Cod_Perfil)
    {
        //
        $perfil=Perfil_Profesional::findOrFail($Cod_Perfil);
        $personal=DB::table('datos_personales')->where('Cod_Personal')->get();

        return view("perfil.edit",["perfil_profesional"=>$perfil,"datos_personales"=>$personal]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil_Profesional  $perfil_Profesional
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, $Cod_Perfil)
    {
        //
        $perfil=Perfil_Profesional::findOrFail($Cod_Perfil);
        $perfil->Cod_Personal=$request->input('Cod_Personal');
        $perfil->Titulo=$request->input('Titulo');
        $perfil->Especialidad=$request->input('Especialidad');
        $perfil->Experiencia_Laboral=$request->input('Experiencia_Laboral');
        $perfil->Cargo=$request->input('Cargo');
        $perfil->Otros=$request->input('Otros');
        $perfil->update();
        return redirect()->route('perfil.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil_Profesional  $perfil_Profesional
     * @return \Illuminate\Http\Response
     */
    public function destroy($Cod_Perfil)
    {
        //
        $perfil=Perfil_Profesional::findOrFail($Cod_Perfil);
        $perfil->delete();
        return redirect()->route('perfil.index');
    }
}
