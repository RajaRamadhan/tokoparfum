<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;
    
    protected $table = 'kasir';

    protected $fillable = [
        'item_name',      
        'item_price',     
        'item_quantity',  
        'total',          
    ];
}
