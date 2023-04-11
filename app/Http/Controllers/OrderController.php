<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Exception;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function cancelOrder($id){
        $order = Order::with('products')->find($id);
        // dd($order->products->toArray());

        $order->status_id =3;
        $order->save();

        return redirect()->back()->with('success','Canceled');
    }

    public function deleteOrder($id){
        $order = Order::with('products')->find($id);
        $order->delete();

        return redirect()->back()->with('success','Deleted');
    }

    public function doneOrder($id){
        $order = Order::with('products')->find($id);
        // dd($order->products->toArray());

        $order->status_id =5;
        $order->save();

        return redirect()->back()->with('success','Thank u so much');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function editOrder($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    // public function order(Request $request){
    //     try {

    //     $data =$request->all();
    //     $cart =json_decode($request->cart);

    //     $order =Order::create($data);
    //     foreach ($cart as $key => $item) {
    //         OrderProduct::create([
    //             'order_id'=>$order->id,
    //             'product_id'=>$item['id']
    //             ]);
    //             return response()->json(['success'=>'Create Order Successful!'],200);
    //          }
    //     } catch (Exception $th) {
    //         //throw $th;

    //     }
    // }

}
