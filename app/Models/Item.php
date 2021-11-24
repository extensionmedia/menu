<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'description',
        'price',
        'name',
        'is_active',
        'image'
    ];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function options(){
        return $this->hasMany(OptionsInItem::class, 'item_id', 'id');
    }
}
