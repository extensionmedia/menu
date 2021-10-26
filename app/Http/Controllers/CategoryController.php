<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commande = Commande::where('is_active', 1)->first();

        $categories = Category::where('is_active', 1)->orderBy('level')->get()->each(function($c) use ($commande){
            $counter = 0;
            if($commande){
                foreach($commande->details as $d){
                    if($d->item->category_id == $c->id){
                        $counter += $d->qte;
                    }
                }
            }
            $c->commande = $counter;
        });

        return view('home')->with([
            'categories'    =>  $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create')->with([
            'UID'       =>      Str::uuid()
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
        $item = Category::create([
            'name'          =>  $request->name,
            'is_active'     =>  $request->has('is_active')? 1:0,
            'level'         =>  $request->level,
            'image'         =>  $request->filename
        ]);
        if($item){
            return response()->json(['response'=>"success", 'message'=>'categorie has been created']);
        }else{
            return response()->json(['response'=>"error", 'message'=>'categorie has not been created']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
