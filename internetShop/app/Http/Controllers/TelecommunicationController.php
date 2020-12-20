<?php

namespace App\Http\Controllers;

use App\Models\Telecommunication;
use Illuminate\Http\Request;

class TelecommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telecoms=Telecommunication::all();
        return view('telecoms.index', compact('telecoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('telecoms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $telecom=new Telecommunication();
        $telecom->name=$request->input('name');
        $telecom->slug_name=$request->input('slug_name');
        $telecom->save();
        return redirect()->route('telecoms.index')->with('success', 'Telecommunication has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telecommunication  $telecom
     * @return \Illuminate\Http\Response
     */
    public function show(Telecommunication $telecom)
    {
        return  view('telecoms.show', compact('telecom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Telecommunication  $telecom
     * @return \Illuminate\Http\Response
     */
    public function edit(Telecommunication $telecom)
    {
        return view('telecoms.edit', compact('telecom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telecommunication  $telecom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telecommunication $telecom)
    {
        $telecom->update($request->only('name', 'slug_name'));
        return redirect()->route('telecoms.index')->with('success', 'Telecommunication has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telecommunication  $telecommunication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telecommunication $telecommunication)
    {
        $telecommunication->delete();
        return redirect()->route('telecoms.index')->with('success', 'Telecommunication has been deleted!');
    }
}
