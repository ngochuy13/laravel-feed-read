<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use PDF;


class PDFController extends Controller {
    function export() {
        $orders = Role::all();
        $pdf = PDF::loadView('pdf-orders', ['orders' => $orders]);
        //return $pdf->download('orders.pdf');
        return PDF::loadView('pdf-orders')->save(public_path().'/pdf-orders.pdf')->stream('pdf-orders.pdf');
    }
    function html() {
        return view('pdf-orders');
    }
}
