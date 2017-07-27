<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\DashBoardService;

class DashBoardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashBoardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * Show DashBoard
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Show list Customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCustomer()
    {
        $customers = $this->dashboardService->listCustomer();

        return view('dashboard.listcustomer', compact('customers'));
    }
}
