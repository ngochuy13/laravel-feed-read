<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public $fillable = ['order_id', 'user_id', 'customer_id', 'amount', 'note_transaction'];
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Relations BelongsTo Order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Relations BelongsTo User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
