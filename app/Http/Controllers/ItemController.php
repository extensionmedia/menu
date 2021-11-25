<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commande;
use App\Models\Item;
use App\Models\ItemOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {

        $UID = Session::has('UID')? Session::get('UID'): (string) Str::uuid();
        $commande = Commande::where('UID', $UID)->first();

        $items = $category->items->each(function($c) use ($commande){
            $counter = 0;
            if($commande){
                foreach($commande->details as $d){
                    if($d->item){
                        if($d->item->id == $c->id){
                            $counter += $d->qte;
                        }
                    }
                }
            }
            $c->commande = $counter;
        });


        return view('item.index')->with([
            'items'     =>  $items,
            'category'  =>  $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create')->with([
            'UID'           =>      Str::uuid(),
            'categories'    =>      Category::where('is_active', 1)->orderBy('level')->get()
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
        $item = Item::create([
            'name'              =>  $request->name,
            'category_id'          =>  $request->category_id,
            'description'   =>  $request->description,
            'is_active'     =>  $request->has('is_active')? 1:0,
            'price'         =>  $request->price,
            'image'         =>  $request->filename
        ]);
        if($item){
            return redirect(route('items', ['category'=>$request->category_id]));
            return response()->json(['response'=>"success", 'message'=>'Item has been created']);
        }else{
            return response()->json(['response'=>"error", 'message'=>'Item has not been created']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $options = ItemOption::orderBy('name')->get();
        return view('item.edit')->with([
            'options'   =>  $options,
            'item'  =>  $item,
            'UID'       =>      Str::uuid(),
            'categories'    =>      Category::where('is_active', 1)->orderBy('level')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->description = $request->description;
        $item->image = $request->filename;
        $item->level = $request->level;
        $item->price = $request->price;
        $item->is_active = $request->has('is_active')? 1:0;
        $item->save();
        return redirect(route('items', ['category'=>$request->category_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->has('item')){
            $item = Item::find($request->item);
            if($item){
                $item->delete();
                return [
                    'status'    =>  'success',
                    'message'   =>  'item deleted'
                ];
            }else{
                return [
                    'status'    =>  'error',
                    'message'   =>  'item not found'
                ];
            }
        }else{
            return [
                'status'    =>  'error',
                'message'   =>  'error request'
            ];
        }
        // return $request->item;
        // return back();
        // dd($item);
    }

    public function activate(Request $request){
        if($request->has('id')){
            $id = $request->id;
            $item = Item::find($id);
            if($item){
                $item->is_active = !$item->is_active;
                $item->save();
                return 1;
            }else{
                return -2;
            }
        }else{
            return -1;
        }
    }
}
