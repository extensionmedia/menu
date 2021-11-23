<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commande;
use App\Models\CommandeQueue;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;
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
            $commande->is_active = 1;
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
    public function destroy(Request $request)
    {

        if($request->has('commande')){
            $commande = Commande::find($request->commande);
            if($commande){
                foreach($commande->details() as $d){
                    $d->delete();
                }
                $commande->delete();
                return [
                    'status'     =>  'success',
                    'message'    =>  'Commande Supprimé'
                ];
            }
        }
        return [
            'status'     =>  'error',
            'message'    =>  'Commande NON Supprimé'
        ];
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
        $allCommandes = Commande::where('is_active', '<', 2)->orderBy('is_active', 'ASC')->orderBy('created_at', 'desc')->get();
        return view('commande.all')->with([
            'commandes'     =>      $allCommandes
        ]);
    }

    public function closed(){
        $allCommandes = Commande::where('is_active', '=', 2)->orderBy('created_at', 'desc')->get();
        $html = "empty";
        foreach($allCommandes as $k=>$c){
            if($k == 0){
                $html = view('commande.partials.left_item')->with(['commande'=>$c]);
            }else{
                $html = $html . "" . view('commande.partials.left_item')->with(['commande'=>$c]);
            }
        }
        return $html;

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
                $commande->is_active = 2;
                $commande->save();
            }
        }
    }

    public function getBy(Request $request){
        if($request->has('livraison_id')){
            $livraison_id = $request->livraison_id;
            if($livraison_id > 0){
                $allCommandes = Commande::where('livraison_id', $livraison_id)->where('is_active', '<', 2)->orderBy('created_at', 'desc')->get();
            }else{
                $allCommandes = Commande::where('is_active', '<', 2)->orderBy('created_at', 'desc')->get();
            }
            $html = "empty";
            foreach($allCommandes as $k=>$c){
                if($k == 0){
                    $html = view('commande.partials.left_item')->with(['commande'=>$c]);
                }else{
                    $html = $html . "" . view('commande.partials.left_item')->with(['commande'=>$c]);
                }
            }
            return $html;
        }
    }

    public function queue(){
        $queues = CommandeQueue::all()->toArray();
        CommandeQueue::truncate();
        return $queues;
    }

    public function print(){
        try {
            // Set params
            $mid = '123123456';
            $store_name = 'YOURMART';
            $store_address = 'Mart Address';
            $store_phone = '1234567890';
            $store_email = 'yourmart@email.com';
            $store_website = 'yourmart.com';
            $tax_percentage = 10;
            $transaction_id = 'TX123ABC456';
            $currency = 'Rp';
            $image_path = 'logo.png';

            // Set items
            $items = [
                [
                    'name' => 'French Fries (tera)',
                    'qty' => 2,
                    'price' => 65000,
                ],
                [
                    'name' => 'Roasted Milk Tea (large)',
                    'qty' => 1,
                    'price' => 24000,
                ],
                [
                    'name' => 'Honey Lime (large)',
                    'qty' => 3,
                    'price' => 10000,
                ],
                [
                    'name' => 'Jasmine Tea (grande)',
                    'qty' => 3,
                    'price' => 8000,
                ],
            ];

            // Init printer
            $printer = new ReceiptPrinter;
            $printer->init(
                config('receiptprinter.connector_type'),
                config('receiptprinter.connector_descriptor')
            );

            // Set store info
            $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

            // Set currency
            $printer->setCurrency($currency);

            // Add items
            foreach ($items as $item) {
                $printer->addItem(
                    $item['name'],
                    $item['qty'],
                    $item['price']
                );
            }
            // Set tax
            $printer->setTax($tax_percentage);

            // Calculate total
            $printer->calculateSubTotal();
            $printer->calculateGrandTotal();

            // Set transaction ID
            $printer->setTransactionID($transaction_id);

            // Set logo
            // Uncomment the line below if $image_path is defined
            //$printer->setLogo($image_path);

            // Set QR code
            $printer->setQRcode([
                'tid' => $transaction_id,
            ]);

            // Print receipt
            $printer->printReceipt();
        } catch (\Throwable $th) {
            return 'Error Printer';
        }

    }

}
