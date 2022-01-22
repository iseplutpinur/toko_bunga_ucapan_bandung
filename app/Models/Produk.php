<?php

namespace App\Models;

use App\Models\produk\properti\Category;
use App\Models\produk\properti\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'slug',
        'color_id',
        'category_id',
        'harga',
        'kutipan',
        'deskripsi',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
