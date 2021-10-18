<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeDetail;
use Illuminate\Http\Request;

class CommandeDetailController extends Controller
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
        $commande = Commande::where('is_active', 1)->first();
        $qte = 2;
        if(!$commande){
            Commande::create([
                'is_active'     =>  1
            ]);
            $commande = Commande::where('is_active', 1)->first();
        }

        CommandeDetail::create([
            'commande_id'       =>  $commande->id,
            'item_id'           =>  $request->item_id
        ]);
        return [
            'status'        =>  'success',
            'message'       =>  'Item added successfuly'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommandeDetail  $commandeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CommandeDetail $commandeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommandeDetail  $commandeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandeDetail $commandeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommandeDetail  $commandeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandeDetail $commandeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommandeDetail  $commandeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandeDetail $commandeDetail)
    {
        //
    }
}
