<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{

    protected $table='category';

    protected $fillable=[
        'name',
        'slug'
    ];

    protected $with = ['categories'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
