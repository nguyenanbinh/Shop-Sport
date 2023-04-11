<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('is.admin');
    }
    public function showOrder(){
        $orders = Order::with(['products'])->orderBy('id','desc')->paginate(10);

        return view('admin.orders.list',compact('orders'));
    }

    public function viewOrder(Request $request){
        if($request->ajax()){
            $orders = Order::with(['products'])->get();

            $html = view('admin.components.order',compact(['orders']))->render();


            return response()->json($html);
        }
    }



    public function actionOrder($id){
        $order = Order::with('products')->find($id);
        // dd($order->products->toArray());
        if($order){
            foreach ($order->products as  $ord) {
                $product =Product::find($ord->id);
                $product->quantity -= $ord->pivot->quantity;
                if($product->quantity>0){
                    $product->save();
                }

            }
        }

        $order->status_id =2;
        $order->save();

        return redirect()->back()->with('success','Order successfully approved!');
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        if($order->status_id>2){
            $order->delete();
            return redirect()->route('admin.orders.list')
        ->with('delete','Order deleted successfully!');
        }else{
            return redirect()->route('admin.orders.list')
        ->with('error','Cannot delete this order!');
        }
    }

    public function editOrder($id)
    {
        $order = Order::find($id);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request, $id)
    {
        // DB::enableQueryLog();
        $order = Order::find($id);
        $data = $request->all();
        $order->update($data);
        return redirect()->route('admin.orders.list')
            ->with('update', 'Order updated successfully!');
    }
}
