<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeDetailOption extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'commande_detail_id',
        'item_option_id'
    ];

    public function item_option(){
        return $this->hasOne(ItemOption::class, 'id', 'item_option_id');
    }

}
