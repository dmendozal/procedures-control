<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $timestamps = false;
    protected $fillable = ['idproduct', 'name', 'stock', 'state','purchase_price', 'sell_price', 'description','fkidcategory'];
    protected $primaryKey = 'idproduct';


    public function category()
    {
        return $this->belongsTo(Category::class, 'fkidcategory');
    }
}
