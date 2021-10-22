<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'item_id',
        'commande_id',
        'qte'
    ];

    public function item(){
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
