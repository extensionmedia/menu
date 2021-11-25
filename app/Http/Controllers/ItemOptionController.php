<?php

namespace App\Http\Controllers;

use App\Models\ItemOption;
use Illuminate\Http\Request;

class ItemOptionController extends Controller
{
    /**
     * Display a listing of the resource.
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
        if($request->has('option_name')){
            $name = $request->option_name;
            if($request->has('is_checked')){
                $is_active = $request->is_checked;
                ItemOption::create([
                    'name'          =>  $name,
                    'is_active'     =>  $is_active? 1: 0
                ]);
                return [
                    'status'        =>  'success',
                    'message'       =>  'Item Option has been created'
                ];
            }
        }
        return [
            'status'        =>  'error',
            'message'       =>  'Item Option hcould not be created'
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemOption  $itemOption
     * @return \Illuminate\Http\Response
     */
    public function show(ItemOption $itemOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemOption  $itemOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemOption $itemOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemOption  $itemOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemOption $itemOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemOption  $itemOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemOption $itemOption)
    {
        //
    }
}
