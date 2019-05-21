<?php

namespace App\Http\Controllers;

use App\Water;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waters=Water::orderBy('id','asc')->paginate(5);
        return view ('diseno.index',compact('waters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('diseno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'actividad'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'fecha'=>'required',
            'terminado'=>'required',
            'comentarios'=>'required',
        ]);
        Water::create($request->all());

        Session::flash('message','Tarea asignada correctamente');
        return redirect()->route('diseno.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function show(Water $water)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function edit(Water $water)
    {
        return view ('diseno.edit', compact ('water'));
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Water $water)
    {
  


         // validate
        // read more on validation at http://laravel.com/docs/validation
        $water = array(
            'nombre'=>'required',
            'actividad'=>'required',
            'inicio'=>'required',
            'fin'=>'required',
            'fecha'=>'required',
            'terminado'=>'required',
            'comentarios'=>'required'
         
        );
        $validator = Validator::make(Input::all(), $water);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('diseno/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $water = Water::find($id);
            $water->nombre       = Input::get('text');
            $water->actividad       = Input::get('text');
            $water->inicio       = Input::get('text');
            $water->fin       = Input::get('text');
            $water->fecha       = Input::get('text');
            $water->terminado       = Input::get('text');
            $water->comentarios       = Input::get('text');



            $water->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('diseno');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function destroy(Water $water)
    {
        $water->delete();
        Session::flash('message','Tarea ha sido borrado  correctamente');
        return redirect()->route('diseno.index');
    }
}
