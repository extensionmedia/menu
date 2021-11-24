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
        'item_option_id'
    ];
}
