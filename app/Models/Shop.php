<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Painting;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity'
    ];

    public function paintings(){
        return $this->hasMany(Painting::class);
    }
}
