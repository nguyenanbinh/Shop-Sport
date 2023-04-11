<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\News;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Sale;
use App\Mail\OrderConfirmMail;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::with('children')->get();
        // return $categories;
        $brands = Brand::all();
        $news = News::with('images')->get();
        $slides = Slide::all();
        // dd($news->toArray());

        //san pham sale
        $productsSale = Product::with('images', 'brand', 'sale')->where('quantity', '>', 0)->whereHas('sale', function ($query) {
            return $query->where('start_day', '<=', now())
                ->where('end_day', '>=', now());
        })
            ->whereNotNull('sale_id')
            ->inRandomOrder()->take(6)->get();

        // dd($productsSale->toArray());
        $featureProducts = Product::with('brand', 'images', 'sale')->where('quantity', '>', 0)->where('category_id', 4)
            ->where('brand_id', 6)
            ->inRandomOrder()->take(4)->get();
        $productsKamito = Product::with('brand', 'images', 'sale')->where('quantity', '>', 0)->where('category_id', 4)
            ->where('brand_id', 6)
            ->inRandomOrder()->take(4)->get();
        $productsUnd = Product::with('brand', 'images', 'sale')->where('quantity', '>', 0)->where('category_id', 5)
            ->where('brand_id', 5)
            ->inRandomOrder()->take(4)->get();
        $productsNike = Product::with('brand', 'images', 'sale')->where('quantity', '>', 0)->where('category_id', 10)
            ->where('brand_id', 1)
            ->inRandomOrder()->take(4)->get();
        $productsAdidas = Product::with('brand', 'images', 'sale')->where('quantity', '>', 0)->where('category_id', 11)
            ->where('brand_id', 2)
            ->inRandomOrder()->take(4)->get();
        // $products = Product::with('brand', 'images', 'sale')->get();
        $data = [
            'categories',
            'brands',
            'news',
            'productsSale',
            'productsAdidas',
            'productsNike',
            'productsUnd',
            'productsKamito',
            'slides',
            // 'proRecommend'
        ];



        //san pham suggest
        if (Auth::check()) {
            $orderID = Order::where('user_id', Auth::id())->pluck('id');
            // dump($orders);
            if (!empty($orderID)) {
                $productID = OrderProduct::whereIn('order_id', $orderID)->distinct()->pluck('product_id');
                // dd($orderProduct);

                $cateID = Product::whereIn('id', $productID)->distinct()->pluck('category_id');
                // dd($cateID);

                $proRecommend = Product::where('quantity', '>', 0)->whereIn('category_id', $cateID)->inRandomOrder()->take(3)->get();
                $data[] = 'proRecommend';
            }
        }

        // $productID = OrderProduct::pluck('product_id')->toArray();
        // // dd($productID->toArray());
        // // $productFeature = array_count_values($productID);
        // // print_r($productFeature);
        // echo '<pre>';
        // print_r(array_count_values($productID));



        // dd($data);

        return view('welcome', compact($data));
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
        //
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

    public function showFormContact()
    {

        return view('mail.contact-form');
    }

    public function contact(Request $request)
    {
        $data = $request->all();
        // dd($data);

        // \Mail::to('nhi12299@gmail.com')->send(new OrderConfirmMail($data));

        $to_email = $data['email'];
        $to_name = $data['name'];
        $from_email = 'nhi12299@gmail.com';
        Mail::send('mail.contact-mail', $data, function ($message) use ($to_email, $to_name, $from_email) {
            $message->to($to_email, $to_name)->subject('Contact Mail');
            $message->from($from_email, 'Shop-Sport');
        });
        return 'success';
    }

    // public function search()
    // {
    //     $categories = Category::with('children')->get();
    //     // dd($category->toArray());
    //     $brands = Brand::all();
    //     $news = News::with('images')->get();
    //     // dd($news->toArray());
    //     $products = Product::with('brand', 'images', 'sale')->where('sale_id', '<>', 'null')->paginate(6);

    //     return view('welcome', compact('categories', 'brands', 'news', 'products'));
    // }

    // public function searchFullText(Request $request)
    // {
    //     if ($request->search != '') {
    //         $data = Product::FullTextSearch('name', $request->search)->get();
    //         foreach ($data as $key => $value) {
    //             echo $value->name;
    //             echo '<br>'; // mình viết vầy cho nhanh các bạn tùy chỉnh cho đẹp nhé
    //         }
    //     }
    // }



    public function productViewed(Request $request)
    {
        if ($request->ajax()) {
            $listID = $request->id;

            $products = Product::whereIn('id', $listID)->take(4)->get();
            $html = view('product-viewed.list-product', compact('products'))->render();
            return response()->json(['data' => $html]);
        }
    }

    public function test(){
        dd(1);
    }
}
