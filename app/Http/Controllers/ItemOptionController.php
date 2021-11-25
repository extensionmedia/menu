<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemOption;
use App\Models\OptionsInItem;
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
        return view('item_option.add');
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
    public function edit(Request $request)
    {
        $id = $request->id;
        $option = ItemOption::find($id);
        return view('item_option.edit')->with([
            'option'    =>  $option
        ]);
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
    public function destroy(Request $request)
    {
        if($request->has('id')){
            $id = $request->id;
            $option = ItemOption::find($id);
            if($option){
                $option->delete();
                foreach(OptionsInItem::where('item_option_id', $id)->get() as $op){
                    $op->delete();
                }
            }
        }
    }

    public function list(Request $request){
        $html = 'khawi';
        if($request->has('id')){
            $item = Item::find($request->id);
            $options = ItemOption::orderBy('name')->get();
            $html = "";
            foreach($options as $k=>$op){
                if($k == 0){
                    $html = view('item_option.partials.item')->with([
                        'item'  =>  $item,
                        'op'    =>  $op
                    ]);
                }else{
                    $html .= view('item_option.partials.item')->with([
                        'item'  =>  $item,
                        'op'    =>  $op
                    ]);
                }
            }
        }
        return $html;
    }
}
