<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['customer_id','content', 'size', 'number', 'total_price', 'deposited', 'remain', 'delivery_date', 'status', 'priority', 'user_id'];

    protected $dates = ['created_at', 'updated_at'];
    /**
     * Relations Transaction
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

}
