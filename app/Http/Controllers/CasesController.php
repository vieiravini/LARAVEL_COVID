<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cases;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Cases::all();

        return view('cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cases.create');
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
            'name'=>'required',
            'email'=>'required'
        ]);

        $cases = new Cases([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'age' => $request->get('age'),
            'city' => $request->get('city'),
            'region' => $request->get('region')
        ]);
        $cases->save();
        return redirect('/cases')->with('success', 'Caso registrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cases = Cases::find($id);
        return view('cases.edit', compact('cases'));        
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
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $cases = Cases::find($id);
        $cases->name =  $request->get('name');
        $cases->email = $request->get('email');
        $cases->age = $request->get('age');
        $cases->city = $request->get('city');
        $cases->region = $request->get('region');
        $cases->save();

        return redirect('/cases')->with('success', 'Caso atualizado!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cases = Cases::find($id);
        $cases->delete();

        return redirect('/cases')->with('success', 'Caso removido!');
    }
}