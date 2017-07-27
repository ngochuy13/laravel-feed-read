<?php

namespace App\Services;

use App\Customer;
use App\Order;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class CustomerService
{

    /**
     * Create Customer
     * @param array $params
     * @return boolean
     */
    public function createCustomer($params)
    {
        if($params){
            $customer = Customer::create($params);
            return $customer;
        }
        return false;
    }

    /**
     * Create Customer Order
     * @param array $params
     * @return boolean
     */
    public function createCustomerOrder($params)
    {
        $user = Auth::user();

        if($params && $params['customer_id'] != 0){
            $params['user_id'] = $user['id'];
            $order = Order::create($params);

            $transaction = Transaction::create([
                'order_id' => $order['id'],
                'customer_id' => $params['customer_id'],
                'user_id' => $user['id'],
                'amount' => $params['deposited'],
                'note_transaction' => ''
            ]);

            return $transaction;

        } else {
            $customer = Customer::create($params);

            $order = Order::create([
                'customer_id' => $customer['id'],
                'content' => $params['content'],
                'size' => $params['size'],
                'number' => $params['number'],
                'total_price' => $params['total_price'],
                'deposited' => $params['deposited'],
                'remain' => $params['remain'],
                'delivery_date' => $params['delivery_date'],
                'status' => $params['status'],
                'priority' => $params['priority'],
                'user_id' => $user['id']
            ]);

            $transaction = Transaction::create([
                'order_id' => $order['id'],
                'customer_id' => $customer['id'],
                'user_id' => $user['id'],
                'amount' => $params['deposited'],
                'note_transaction' => ''
            ]);

            return $transaction;

        }
        return false;
    }

    /**
     * Check Duplicate Phone
     * @param string $phone
     * @return Object
     */
    public function checkDuplicatePhone($phone)
    {
        return Customer::where('phone', $phone)->first();
    }

    /**
     * Get customer Request Json
     * @param string $phone
     * @return Object
     */
    public function requestJson($phone)
    {
        return Customer::select('id', 'name', 'address', 'phone', 'company')
            ->where('phone', 'like' , '%'.$phone.'%')->get();
    }

    public function requestListJson()
    {
        return Customer::all();
    }

}
