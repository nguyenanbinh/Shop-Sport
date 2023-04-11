<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\News;
use App\Models\Feedback;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::with('brand', 'images', 'sale')->paginate(9);
        // dd($products->toArray());
        $brands = Brand::all();
        $news = News::with('images')->get();

        if ($request->price) {
            $price = $request->price;
            // dd($price);
            switch ($price) {
                case '1':
                    $products = Product::where('price', '<', 100)->with('brand', 'images', 'sale')->paginate(9);
                    // dd($products->toArray());
                    break;
                case '2':
                    $products = Product::whereBetween('price', [100, 300])->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case '3':
                    $products = Product::whereBetween('price', [300, 500])->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case '4':
                    $products = Product::whereBetween('price', [500, 700])->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case '5':
                    $products = Product::whereBetween('price', [700, 900])->with('brand', 'images', 'sale')->paginate(9);
                    break;
            }
        }
        // else{
        //     $products = Product::with('brand', 'images', 'sale')->paginate(9);
        // }

        if ($request->orderby) {
            $orderby = $request->orderby;

            switch ($orderby) {
                case 'desc':
                    $products = Product::orderBy('id', 'DESC')->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case 'asc':
                    $products = Product::orderBy('id', 'ASC')->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case 'price_max':
                    $products = Product::orderBy('price', 'ASC')->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case 'price_min':
                    $products = Product::orderBy('price', 'DESC')->with('brand', 'images', 'sale')->paginate(9);
                    break;
            }
        }
        // else {
        //     $products = Product::with('brand', 'images', 'sale')->paginate(9);
        // }

        return view('products.list-product', compact('products', 'categories', 'brands', 'news'));
    }

    public function listProductsSale(Request $request)
    {
        $categories = Category::with('children')->get();
        // dd($category->toArray());
        $brands = Brand::all();
        $news = News::with('images')->get();
        // dd($news->toArray());
        $productsSale = Product::with('images', 'brand', 'sale')
            ->whereHas('sale', function ($query) {
                return $query->where('start_day', '<=', now())
                    ->where('end_day', '>=', now());
            })
            ->whereNotNull('sale_id')
            ->inRandomOrder()
            ->paginate(9);

        if ($request->price) {
            $price = $request->price;
            // dd($price);
            switch ($price) {
                case '1':
                    $productsSale = Product::where(1-'price', '<', 100)->with('brand', 'images', 'sale')
                        ->whereHas('sale', function ($query) {
                            return $query->where('start_day', '<=', now())
                                ->where('end_day', '>=', now());
                        })
                        ->whereNotNull('sale_id')->paginate(9);
                    // dd($products->toArray());
                    break;
                case '2':
                    $productsSale = Product::whereBetween('price', [100, 300])->with('brand', 'images', 'sale')
                        ->whereHas('sale', function ($query) {
                            return $query->where('start_day', '<=', now())
                                ->where('end_day', '>=', now());
                        })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;

                case '3':
                    $productsSale = Product::whereBetween('price', [300, 500])->with('brand', 'images', 'sale')
                        ->whereHas('sale', function ($query) {
                            return $query->where('start_day', '<=', now())
                                ->where('end_day', '>=', now());
                        })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;

                case '4':
                    $productsSale = Product::whereBetween('price', [500, 700])->with('brand', 'images', 'sale')
                        ->whereHas('sale', function ($query) {
                            return $query->where('start_day', '<=', now())
                                ->where('end_day', '>=', now());
                        })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;

                case '5':
                    $productsSale = Product::whereBetween('price', [700, 900])->with('brand', 'images', 'sale')
                        ->whereHas('sale', function ($query) {
                            return $query->where('start_day', '<=', now())
                                ->where('end_day', '>=', now());
                        })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;
            }
        }

        if ($request->orderby) {
            $orderby = $request->orderby;

            switch ($orderby) {
                case 'desc':
                    $productsSale = Product::orderBy('id', 'DESC')->with('brand', 'images', 'sale')->whereHas('sale', function ($query) {
                        return $query->where('start_day', '<=', now())
                            ->where('end_day', '>=', now());
                    })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;

                case 'asc':
                    $productsSale = Product::orderBy('id', 'ASC')->with('brand', 'images', 'sale')->whereHas('sale', function ($query) {
                        return $query->where('start_day', '<=', now())
                            ->where('end_day', '>=', now());
                    })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;

                case 'price_max':
                    $productsSale = Product::orderBy('price', 'ASC')->with('brand', 'images', 'sale')->whereHas('sale', function ($query) {
                        return $query->where('start_day', '<=', now())
                            ->where('end_day', '>=', now());
                    })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;

                case 'price_min':
                    $productsSale = Product::orderBy('price', 'DESC')->with('brand', 'images', 'sale')->whereHas('sale', function ($query) {
                        return $query->where('start_day', '<=', now())
                            ->where('end_day', '>=', now());
                    })
                        ->whereNotNull('sale_id')->paginate(9);
                    break;
            }
        }

        return view('sale.list-products', compact('categories', 'brands', 'news', 'productsSale'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




        // $product->quantity = ($product['quantity'] -= 1);
        // $product->save();



        $product = Product::with('brand', 'images')->find($id);
        $brands    = Brand::all();
        $categories = Category::all();
        $news = News::with('images')->get();
        $feedbacks = Feedback::with('user', 'product')->get();
        // dd($feedbacks->toArray());

        $cateID = Product::where('id',$id)->pluck('category_id');
        $productByCate = Product::where('category_id',$cateID)->inRandomOrder()->take(4)->get();
        // dd($productByBrand->toArray());
        $data= [
            'product',
            'brands',
            'categories',
            'news',
            'feedbacks',
            'productByCate'
        ];

        return view('products.product-details', compact($data));
    }

    public function deleteFeedback($proID,$id)
    {
        $feedback= Feedback::where('id',$id)->delete();
        // $feedback = Feedback::find($feedbackID);
        // dd($feedbackID);
        // dd($feedback->toArray());
        // $feedback->delete();

        return redirect()->route('product-details',$proID);
    }

    public function editFeedback($proID,$id)
    {
        $product = Product::with('brand', 'images')->find($proID);
        $brands    = Brand::all();
        $categories = Category::all();
        $news = News::with('images')->get();
        $feedbacks = Feedback::with('user', 'product')->get();
        // dd($feedbacks->toArray());

        $cateID = Product::where('id',$proID)->pluck('category_id');
        $productByCate = Product::where('category_id',$cateID)->inRandomOrder()->take(4)->get();
        // dd($productByBrand->toArray());


        $feedback= Feedback::where('id',$id)->get();

        $data= [
            'product',
            'brands',
            'categories',
            'news',
            'feedbacks',
            'productByCate',
            'feedback'
        ];

        return view('products.edit-feedback', compact($data));
    }

    public function updateFeedback(Request $request,$proID,$id)
    {
        $data = $request->only('content');
        // dd($data);

        $feedback= Feedback::where('id',$id)->update($data);

        return redirect()->route('product-details',$proID);
    }

    /**     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function searchByName(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->q . '%')->get();
        // dd($products->toArray());
        return response()->json($products);
    }

    public function searchList(Request $request)
    {

        $categories = Category::all();
        // $products = Product::with('brand', 'images', 'sale')->paginate(9);
        // dd($products->toArray());
        $brands = Brand::all();
        $news = News::with('images')->get();

        if ($request->price) {
            $price = $request->price;
            // dd($price);
            switch ($price) {
                case '1':
                    $products = Product::where('price', '<', 100)->with('brand', 'images', 'sale')->paginate(9);
                    // dd($products->toArray());
                    break;
                case '2':
                    $products = Product::whereBetween('price', [100, 300])->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case '3':
                    $products = Product::whereBetween('price', [300, 500])->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case '4':
                    $products = Product::whereBetween('price', [500, 700])->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case '5':
                    $products = Product::whereBetween('price', [700, 900])->with('brand', 'images', 'sale')->paginate(9);
                    break;
            }
        }
        // else{
        //     $products = Product::with('brand', 'images', 'sale')->paginate(9);
        // }

        if ($request->orderby) {
            $orderby = $request->orderby;

            switch ($orderby) {
                case 'desc':
                    $products = Product::orderBy('id', 'DESC')->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case 'asc':
                    $products = Product::orderBy('id', 'ASC')->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case 'price_max':
                    $products = Product::orderBy('price', 'ASC')->with('brand', 'images', 'sale')->paginate(9);
                    break;

                case 'price_min':
                    $products = Product::orderBy('price', 'DESC')->with('brand', 'images', 'sale')->paginate(9);
                    break;
            }
        }
        // else {
        //     $products = Product::with('brand', 'images', 'sale')->paginate(9);
        // }

        // return view('products.list-product', compact('products', 'categories', 'brands', 'news'));

        // $search = $request->only('q');
        // dd($search);



        $products = Product::where('name','like', '%' .$request->q. '%')->paginate(6);
        // dd($products->toArray());



        $data = [
            'categories',
            'brands',
            'news',
            'products'
        ];

        return view('products.list-search', compact($data));

    }
}
