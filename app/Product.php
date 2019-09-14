<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Laravel\Scout\Searchable;
use App\Category;

class Product  extends Model
{
    use SearchableTrait, Searchable;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 2,
        ],
    ];

    public function searchableAs()
    {
        return 'name';
    }

    protected $table='products';

    protected $fillable=[
        'name','slug','details','price', 'description','status','quantity','image','images'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function pathAttachment(){
        return  "/storage/".$this->image;
    }



    public function presentPrice()
    {

        return 'S/'.$this->price;

    }

}
