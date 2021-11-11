<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_active',
        'UID',
        'table_id'
    ];

    public function details(){
        return $this->hasMany(CommandeDetail::class);
    }
}
