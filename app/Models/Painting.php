<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shops;

class Painting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'arrival_date',
        'author_name',
        'tienda_id'
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
