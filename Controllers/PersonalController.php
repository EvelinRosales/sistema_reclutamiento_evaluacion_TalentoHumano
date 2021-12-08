<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use Illuminate\Http\Request;
use App\Models\Personal;
use DB;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        /*$personals=Personal::all();
        return $personals;*/
        //return view('personal.index');
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $registro=DB::table('datos_personales')->where('Apellido_Paterno','LIKE','%'.$query.'%')->orderBy('Cod_Personal','desc')
                ->paginate(8);
                return view('personal.index',["datos_personales"=>$registro,"searchText"=>$query]);
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
        return view('personal.create');
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
        //$datospersonal = request()->all();
        $registro=new Personal;
        $registro->Nombres=$request->input('Nombres');
        $registro->Apellido_Paterno=$request->input('Apellido_Paterno');
        $registro->Apellido_Materno=$request->input('Apellido_Materno');
        $registro->Email=$request->input('Email');
        $registro->Genero=$request->input('Genero');
        $registro->Carnet_Identidad=$request->input('Carnet_Identidad');
        $registro->Num_Celular=$request->input('Num_Celular');
        $registro->save();
        return redirect()->route('personal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show($Cod_Personal)
    {
        // return view("personal.show",["datos_personales"=>Personal::findOrFail($Cod_Personal)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($Cod_Personal)
    {
        //
        $registro=Personal::findOrFail($Cod_Personal);
        return view("personal.edit",compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Cod_Personal)
    {
        //
        $registro=Personal::findOrFail($Cod_Personal);
        $registro->nombres=$request->input('Nombres');
        $registro->Apellido_Paterno=$request->input('Apellido_Paterno');
        $registro->Apellido_Materno=$request->input('Apellido_Materno');
        $registro->Email=$request->input('Email');
        $registro->Genero=$request->input('Genero');
        $registro->Carnet_Identidad=$request->input('Carnet_Identidad');
        $registro->Num_Celular=$request->input('Num_Celular');
        $registro->save();
        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($Cod_Personal)
    {
        //
        $registro=Personal::findOrFail($Cod_Personal);
        $registro->delete();
        return redirect()->route('personal.index');
        //Personal::destroy($Cod_Personal);
        //return redirect('personal');

    }
}
