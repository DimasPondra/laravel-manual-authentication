<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function productHasTag()
    {
        return $this->hasMany(ProductHasTag::class, 'products_id', 'id');
    }
}
