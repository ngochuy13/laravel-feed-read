<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = ['name','address', 'phone', 'company'];

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
