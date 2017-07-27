<?php

namespace App\Services;

use App\Order;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionService
{

    /**
     * Create Customer
     * @param array $params
     * @return boolean
     */
    public function createTransaction($params)
    {
        $user = Auth::user();
        if($params){
            $params['user_id'] = $user['id'];
            if(empty($params['note_transaction'])){
                $params['note_transaction'] = '';
            }
            $transaction = Transaction::create($params);

            $order = Order::findOrFail($params['order_id']);

            if($transaction && $order) {
                $amount = (int)$order['remain'] - ((int)$params['amount']);
                Order::where('id' , $params['order_id'])
                    ->update([
                        'remain' => (int)$amount,
                        'updated_at' => Carbon::now()
                    ]);
            }
            return $transaction;
        }
        return false;
    }
}
