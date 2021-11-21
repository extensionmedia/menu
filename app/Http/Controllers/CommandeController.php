<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commande;
use App\Models\CommandeQueue;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UID = Session::has('UID')? Session::get('UID'): (string) Str::uuid();
        return view('commande.index')->with([
            'commande'      =>      Commande::where('UID', $UID)
                                            ->first()
        ]);
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
        $commande_id = $request->has('commande_id')? $request->commande_id: 0;
        $commande = Commande::find($commande_id);
        if($commande){
            $commande->client_name = $request->has('client_name')? $request->client_name: "";
            $commande->client_telephone = $request->has('client_telephone')? $request->client_telephone: "";
            $commande->livraison_time = $request->has('livraison_time')? $request->livraison_time: "";
            $commande->livraison_id = $request->has('livraison_id')? $request->livraison_id: 1;
            $commande->save();

            CommandeQueue::create([
                'commande_id'   =>  $commande_id
            ]);
            Session::forget('UID');
            Session::flash('message', "Commande Confirmé!!");
            return back();
            return [
                'status'    =>  'success',
                'message'   =>  'Commande confirmed'
            ];

        }else{
            Session::flash('message', "Error Commande Non Confirmé!!");
            return back();
            return [
                'status'    =>  'error',
                'message'   =>  'Error Commande confirmation'
            ];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }

    public function counter(){
        $UID = Session::has('UID')? Session::get('UID'): (string) Str::uuid();
        $commande = Commande::where('UID', $UID)->first();
        $counter = 0;

        if($commande){
            foreach($commande->details as $d){
                $counter += $d->qte;
            }
        }

        return $counter;
    }

    public function all(){
        $allCommandes = Commande::orderBy('is_active', 'asc')->orderBy('created_at', 'desc')->get();
        return view('commande.all')->with([
            'commandes'     =>      $allCommandes
        ]);
    }

    public function ticket(Request $request){
        $id = $request->id;
        $commande = Commande::find($id);
        return view('commande.ticket')->with([
            'commande'      =>      $commande
        ]);
    }

    public function getNumber(){
        $UID = Session::has('UID')? Session::get('UID'): (string) Str::uuid();
        $commande = Commande::where('UID', $UID)->first();
        $id = 0;

        if($commande){
            return $commande->id;
        }

        return $id;
    }

    public function ticketClose(Request $request){
        if($request->has('id')){
            $commande = Commande::find($request->id);
            if($commande){
                $commande->is_active = 0;
                $commande->save();
            }
        }
    }
}
