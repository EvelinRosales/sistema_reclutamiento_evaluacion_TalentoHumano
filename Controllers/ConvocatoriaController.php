<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use Illuminate\Http\Request;
use DB;

class ConvocatoriaController extends Controller
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
            $convocatoria=DB::table('convocatoria')->where('Area','LIKE','%'.$query.'%')->orderBy('id_convocatoria','desc')
                ->paginate(8);
                return view('convocatoria.index',["convocatoria"=>$convocatoria,"searchText"=>$query]);
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
        return view('convocatoria.create');
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
        $convocatoria=new Convocatoria;
        $convocatoria->Area=$request->input('Area');
        $convocatoria->Descripcion=$request->input('Descripcion');
        $convocatoria->Requisitos=$request->input('Requisitos');
        $convocatoria->Condicion=$request->input('Condicion');
        
        $convocatoria->save();
        return redirect()->route('convocatoria.index');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function show(Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id_convocatoria)
    {
        //
        $convocatoria=Convocatoria::findOrFail($id_convocatoria);
        return view("convocatoria.edit",compact('convocatoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_convocatoria)
    {
        //
        
        $convocatoria=Convocatoria::findOrFail($id_convocatoria);
        $convocatoria->Area=$request->input('Area');
        $convocatoria->Descripcion=$request->input('Descripcion');
        $convocatoria->Requisitos=$request->input('Requisitos');
        $convocatoria->Condicion=$request->input('Condicion');
        $convocatoria->save();
        return redirect()->route('convocatoria.index');

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_convocatoria)
    {
        //
        $convocatoria=Convocatoria::findOrFail($id_convocatoria);
        $convocatoria->delete();
        return redirect()->route('convocatoria.index');
    }
}
