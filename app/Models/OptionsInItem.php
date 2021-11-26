<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsInItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'item_id',
        'item_option_id',
        'is_default'
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function option(){
        return $this->belongsTo(ItemOption::class, 'item_option_id', 'id');
    }
}
