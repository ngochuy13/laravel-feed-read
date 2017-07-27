<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\UserService;

class OrderController extends Controller {
    protected $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $orders = $this->orderService->getListOrder($request->all());
        $status = ['' => 'Chọn tình trạng'] + config('forms.Order.status');
        return view('order.index', compact('orders', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $order = $this->orderService->getOrderDetail($id);
        $transactions = $this->orderService->getRelationOrderTransaction($id);
        $status = config('forms.Order.status');
        if($order){
            $users = UserService::getAllUser();
            return view('order.show',compact('order','users', 'status', 'transactions'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update Order.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($this->orderService->updateOrder($request->all())) {
            return redirect()->route('Order.index');
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function requestJson(Request $request) {
        $customer = $this->customerService->requestJson($request->get('phone'));
        return Response::json($customer);
    }

    /**
     * Filter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter()
    {
        $transactionToday = $this->orderService->filterTransactionToday();
        $orderToday = $this->orderService->filterOrderToday();

        $transactionYesterday = $this->orderService->filterTransactionYesterday();
        $orderYesterday = $this->orderService->filterOrderYesterday();

        $orderLastWeek = $this->orderService->filterOrderLastWeek();
        $transactionLastWeek = $this->orderService->filterTransactionLastWeek();

        $orderMonth = $this->orderService->filterOrderLastMonth();
        $transactionMonth = $this->orderService->filterTransactionLastMonth();

        $orderThreeMonth = $this->orderService->filterOrderThreeMonth();
        $transactionThreeMonth = $this->orderService->filterTransactionThreeMonth();

        return view('order.filter', compact(
            'transactionToday',
            'orderToday',
            'transactionYesterday',
            'orderYesterday',
            'orderLastWeek',
            'transactionLastWeek',
            'orderMonth',
            'transactionMonth',
            'orderThreeMonth',
            'transactionThreeMonth'
        ));
    }
}
