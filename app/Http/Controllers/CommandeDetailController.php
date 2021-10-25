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
        $qte = 1;
        if(!$commande){
            Commande::create([
                'is_active'     =>  1
            ]);
            $commande = Commande::where('is_active', 1)->first();
        }

        $item_id = $request->item_id;
        foreach($commande->details()->get() as $d){
            if($d->item_id == $item_id){
                $qte++;
            }
        }
        if($qte == 1){
            CommandeDetail::create([
                'commande_id'       =>  $commande->id,
                'item_id'           =>  $request->item_id,
                'qte'               =>  $qte
            ]);
        }else{
            $detail = CommandeDetail::where('item_id', $item_id)->where('commande_id', $commande->id)->first();
            $detail->qte++;
            $detail->save();
        }


        return redirect(route('commande.index'));

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
    public function destroy(Request $request){
        try {
            $id = $request->id;

            $detail = CommandeDetail::find($id);
            $detail->delete();
            return response()->json(['response'=>"success", "message"=>"detail deleted"]);

        } catch (\Throwable $th) {
            return response()->json(['response'=>"error"]);
        }
    }
}
