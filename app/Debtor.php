<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    protected $table = "debtor";
    public $timestamps = false;
    protected $fillable = ['iddebtor', 'debt', 'date', 'state_debtor','state','fkidperson','fkidsale'];
    protected $primaryKey = 'iddebtor';


    public function person()
    {
        return $this->belongsTo(Person::class, 'fkidperson');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'fkidsale');
    }
}
