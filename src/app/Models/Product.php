<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["category_id", "maker", "name", "price"]; // 追記
    public function category()
    {
        // dd(
        //     Product::get(),
        //     Product::paginate(20)
        // );

        return $this->belongsTo(Category::class);
    }
}
