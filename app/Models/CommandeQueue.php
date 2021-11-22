<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeQueue extends Model
{
    use HasFactory;
    protected $fillable = [
        'commande_id'
    ];

    public function commande(){
        return $this->belongsTo(Commande::class, 'commande_id', 'id');
    }
}
