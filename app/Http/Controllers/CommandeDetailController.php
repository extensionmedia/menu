<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeDetail;
use App\Models\CommandeDetailOption;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
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

        //dd($request->all());

        $UID = Session::has('UID')? Session::get('UID'): (string) Str::uuid();
        $table_id = $request->has('table_id')? $request->table_id: 1;
        $livraison_id = $request->has('livraison_id')? $request->livraison_id: 1;
        $commande = Commande::where('is_active', 0)
                            ->where('UID', $UID)
                            ->where('table_id', $table_id)
                            ->first();
        $qte = 1;
        if(!$commande){
            Session::forget('UID');
            Session::put('UID', $UID);

            Commande::create([
                'is_active'     =>  0,
                'table_id'      =>  $table_id,
                'UID'           =>  $UID,
                'livraison_id'  =>  $livraison_id
            ]);
            $commande = Commande::where('is_active', 0)
                            ->where('UID', $UID)
                            ->where('table_id', $table_id)
                            ->first();
        }

        $item_id = $request->item_id;
        foreach($commande->details()->get() as $d){
            if($d->item_id == $item_id){
                $qte++;
            }
        }
        $detail = null;
        if($qte == 1){
            $detail = CommandeDetail::create([
                'commande_id'       =>  $commande->id,
                'item_id'           =>  $request->item_id,
                'qte'               =>  $qte
            ]);
        }else{
            $detail = CommandeDetail::where('item_id', $item_id)->where('commande_id', $commande->id)->first();
            $detail->qte++;
            $detail->save();
        }

        $detail->options()->delete();

        if($request->has('item_options')){

            foreach($request->item_options as $op){
                CommandeDetailOption::create([
                    'commande_detail_id'        =>      $detail->id,
                    'item_option_id'            =>      $op
                ]);
            }
        }


        Session::flash('message', "Commande Modifi??!!");
        return back();

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
