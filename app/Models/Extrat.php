<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrat extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'name',
        'is_active',
        'image'
    ];
    public $timestamps = false;
}
