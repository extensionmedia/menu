<?php

namespace App\Http\Controllers;

use App\Models\Extrat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExtratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.extrat.index')->with([
            'extrats'       =>      Extrat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.extrat.create')->with([
            'UID'       =>     Str::uuid()
        ]);
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
            'name' => ['required', 'string', 'max:255'],
        ]);

        Extrat::create([
            'name' => $request->name,
            'price' => $request->has('price')? $request->price:0,
            'is_active'     =>  $request->has('is_active')? 1:0,
            'image'         =>  $request->filename
        ]);
        return redirect(route('extrat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extrat  $extrat
     * @return \Illuminate\Http\Response
     */
    public function show(Extrat $extrat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extrat  $extrat
     * @return \Illuminate\Http\Response
     */
    public function edit(Extrat $extrat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extrat  $extrat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extrat $extrat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extrat  $extrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extrat $extrat)
    {
        //
    }
}
