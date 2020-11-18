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
        'price',
        'is_active'
    ];

    protected $appends = [
        'product_code'
    ];

    public function getProductCodeAttribute(): string
    {
        return 'Product-Code-' . $this->id;
    }
}
