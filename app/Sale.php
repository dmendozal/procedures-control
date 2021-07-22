<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sale";
    public $timestamps = false;
    protected $fillable = ['idsale', 'date', 'total', 'paid_out','fkidperson'];
    protected $primaryKey = 'idsale';

    public function person()
    {
        return $this->belongsTo(Person::class, 'fkidperson');
    }
    // public function product()
    // {
    //     return $this->belongsToMany(Product::class, 'detail', 'idsale', 'idproduct');
    // }
}

