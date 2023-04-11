<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function showProductsByBrand($id,Request $request)
    {
        $categories = Category::with('children')->get();
        // dd($category->toArray());
        $brands = Brand::all();
        $news = News::with('images')->get();

        $brand = Brand::find($id);
        $products = Product::with('images', 'brand', 'sale')
            ->where('brand_id', $id)
            ->inRandomOrder()->paginate(6);

            if ($request->price) {
                $price = $request->price;
                // dd($price);
                switch ($price) {
                    case '1':
                        $products = Product::where('price', '<', 100)->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        // dd($products->toArray());
                        break;
                    case '2':
                        $products = Product::whereBetween('price', [100, 300])->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;

                    case '3':
                        $products = Product::whereBetween('price', [300, 500])->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;

                    case '4':
                        $products = Product::whereBetween('price', [500, 700])->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;

                    case '5':
                        $products = Product::whereBetween('price', [700, 900])->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;
                }
            }

            if ($request->orderby) {
                $orderby = $request->orderby;

                switch ($orderby) {
                    case 'desc':
                        $products = Product::orderBy('id', 'DESC')->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;

                    case 'asc':
                        $products = Product::orderBy('id', 'ASC')->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;

                    case 'price_max':
                        $products= Product::orderBy('price', 'ASC')->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;

                    case 'price_min':
                        $products = Product::orderBy('price', 'DESC')->with('brand', 'images', 'sale')
                        ->where('brand_id', $id)
                        ->paginate(9);
                        break;
                }
            }
            $data=[
                'categories',
                'products',
                'news',
                'brands',
                'brand'
            ];

        return view('brands.list-products',compact($data));
    }
}
