<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'level',
        'is_active',
        'image'
    ];
    public $timestamps = false;
    public function items(){
        return $this->hasMany(Item::class);
    }

    // public function commande(){
    //     $details = collect();
    //     $commande = Commande::where('is_active', 1)->first();
    //     if($commande){
    //         foreach($commande->details() as $d){
    //             if($d->item->category_id == $this->id){
    //                 $details->push($d);
    //             }
    //         }
    //     }
    //     return $details;
    // }

}
