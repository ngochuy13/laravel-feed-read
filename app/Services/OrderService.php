<?php

namespace App\Services;

use App\Order;
use App\Customer;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderService
{

    public function getListOrder($params)
    {
        $query = DB::table('orders')
            ->select('*');
        if ($params) {
            if (!empty($params['start_day'])) {
                $query->where('created_at', '>=', $params['start_day'] . ' 00:00:00');
            }
            if (!empty($params['end_day'])) {
                $query->where('created_at', '>=', $params['end_day'] . ' 23:59:59');
            }
            if (!empty($params['status'])) {
                $query->where('status', $params['status']);
            }
        }
        if(empty($params['perPage'])){
            $query->paginate(config('forms.common.perPage'));
        }

        $results = $query->orderBy('created_at', 'DESC')->paginate(config('forms.common.perPage'));
        return $results;
    }

    /**
     * Check Duplicate Phone
     * @param string $phone
     * @return Object
     */
    public function checkDuplicatePhone($phone)
    {
    }

    /**
     * Get customer Request Json
     * @param string $phone
     * @return Object
     */
    public function requestJson($phone)
    {
    }


    public function getOrderDetail($id){
        $order = Order::findOrFail($id);
        return $order;
    }

    /**
     * Update Order
     * @param array $params
     * @return boolean
     */
    public function updateOrder($params)
    {
        if($params) {
            return Order::where('id' , $params['id'])
                ->update([
                    'status' => $params['status'],
                    'user_id' => $params['user_id']
                ]);
        }

        return false;
    }

    public function getRelationOrderTransaction($id)
    {
        if (! $id) {
            abort(404);
        }
        return Order::find($id)->transaction()->orderBy('created_at', 'DECS')->get();
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterOrderToday()
    {
        $startOfDay = Carbon::today()->startOfDay()->toDateTimeString();
        $endOfDay = Carbon::today()->endOfDay()->toDateTimeString();
        return Order::whereBetween('created_at', [$startOfDay, $endOfDay])->count();
    }

    /**
     * Filter Transaction Today
     * @return mixed
     */
    public function filterTransactionToday()
    {
        $startOfDay = Carbon::today()->startOfDay()->toDateTimeString();
        $endOfDay = Carbon::today()->endOfDay()->toDateTimeString();
        return Transaction::whereBetween('created_at', [$startOfDay, $endOfDay])->sum('amount');
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterOrderYesterday()
    {
        $startOfDay = Carbon::yesterday()->startOfDay()->toDateTimeString();
        $endOfDay = Carbon::yesterday()->endOfDay()->toDateTimeString();
        return Order::whereBetween('created_at', [$startOfDay, $endOfDay])->count();
    }

    /**
     * Filter Transaction Yesterday
     * @return mixed
     */
    public function filterTransactionYesterday()
    {
        $startOfDay = Carbon::yesterday()->startOfDay()->toDateTimeString();
        $endOfDay = Carbon::yesterday()->endOfDay()->toDateTimeString();
        return Transaction::whereBetween('created_at', [$startOfDay, $endOfDay])->sum('amount');
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterOrderLastWeek()
    {
        $startOfWeek = Carbon::yesterday()->startOfWeek()->toDateTimeString();
        $endOfWeek  = Carbon::yesterday()->endOfWeek()->toDateTimeString();
        return Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterTransactionLastWeek()
    {
        $startOfWeek = Carbon::yesterday()->startOfWeek()->toDateTimeString();
        $endOfWeek  = Carbon::yesterday()->endOfWeek()->toDateTimeString();
        return Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('amount');
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterOrderLastMonth()
    {
        $startOfMonth = Carbon::yesterday()->subMonth()->toDateString() . ' 00:00:00';
        $endOfMonth  = Carbon::yesterday()->endOfDay()->toDateTimeString();
        return Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterTransactionLastMonth()
    {
        $startOfMonth = Carbon::yesterday()->subMonth()->toDateString() . ' 00:00:00';
        $endOfMonth  = Carbon::yesterday()->endOfDay()->toDateTimeString();
        return Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('amount');
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterOrderThreeMonth()
    {
        $startOfMonth = Carbon::yesterday()->subMonth(3)->toDateString() . ' 00:00:00';
        $endOfMonth  = Carbon::yesterday()->endOfDay()->toDateTimeString();
        return Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    }

    /**
     * Filter Order Today
     * @return mixed
     */
    public function filterTransactionThreeMonth()
    {
        $startOfMonth = Carbon::yesterday()->subMonth(3)->toDateString() . ' 00:00:00';
        $endOfMonth  = Carbon::yesterday()->endOfDay()->toDateTimeString();
        return Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('amount');
    }


}
