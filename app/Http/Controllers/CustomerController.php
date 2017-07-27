<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct( CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        if($this->customerService->createCustomer($request->all())) {
            return redirect()->route('Customer.list');
        }
        abort(404);
    }

    /**
     * creating a new request Customer Order.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestCusOrder()
    {
        return view('customer.create_customer_order');
    }

    /**
     * Store a newly created Customer Order.
     *
     * @param  CustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCusOrder(CustomerRequest $request)
    {
        if($this->customerService->createCustomerOrder($request->all())) {
            return redirect()->route('Order.index');
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function requestJson(Request $request)
    {
        $customer = $this->customerService->requestJson($request->get('phone'));
        return Response::json($customer);
    }

    public function requestListJson()
    {
        $customers = $this->customerService->requestListJson();
        $data = [];
        if($customers){
            foreach ($customers as $customer){
                $data[] = [
                    "id" => $customer->id,
                    "name" =>$customer->name,
                    "phone" =>$customer->phone,
                    "address" =>$customer->address,
                    "action" => '<a href="'.route('Customer.request').'"><span class="ti-arrow-circle-right"></span></a>'
                ];
            }
        }
        return Response::json(['data' => $data]);
    }

}
