<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHasTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'tags_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tags_id', 'id');
    }
}
