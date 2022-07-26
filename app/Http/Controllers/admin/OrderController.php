<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\AdminNote;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $items = Order::all();
        return view('admin.orders.index',compact('items'));

    }



    public function show($id)
    {
        $order = Order::query()->find($id);
        return view('admin.orders.show',compact('order'));
    }

    public function update(Order $order)
    {

        if($order->status != \request()->status){
           $order->tracks()->create([

            'status' => \request('status'),
            'message' => \request()->status_notes ?? (' Order Status '.\request('status')),
           ]);
           AdminNote::send(" The Order ".$order->id," Its Status Has Changed To ".\request()->status);


        }
        $order ->update(\request()->only('status'));
        return back();
    }


}
