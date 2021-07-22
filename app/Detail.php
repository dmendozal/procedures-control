<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = "detail";
    public $timestamps = false;
    protected $fillable = ['amount','price','subtotal','fkidsale','fkidproduct'];
    protected $primaryKey = 'fkidsale';

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'fkidsale');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'fkidproduct');
    }
}
