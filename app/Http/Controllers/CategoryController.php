<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.list');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function listProductByCate($id,Request $request)
    {
        // $products = Category::find($id)->products;
        $categories = Category::with('children')->get();
        $category = Category::find($id);
        // dd($category->toArray());
        $brands = Brand::all();
        $news = News::with('images')->get();

        $products = Product::with('images', 'brand', 'sale')
            ->where('category_id', $id)
            ->inRandomOrder()->paginate(9);
        // dd($products->toArray());

        if ($request->price) {
            $price = $request->price;
            // dd($price);
            switch ($price) {
                case '1':
                    $products = Product::where('price', '<', 100)->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    // dd($products->toArray());
                    break;
                case '2':
                    $products = Product::whereBetween('price', [100, 300])->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;

                case '3':
                    $products = Product::whereBetween('price', [300, 500])->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;

                case '4':
                    $products = Product::whereBetween('price', [500, 700])->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;

                case '5':
                    $products = Product::whereBetween('price', [700, 900])->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;
            }
        }

        if ($request->orderby) {
            $orderby = $request->orderby;

            switch ($orderby) {
                case 'desc':
                    $products = Product::orderBy('id', 'DESC')->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;

                case 'asc':
                    $products = Product::orderBy('id', 'ASC')->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;

                case 'price_max':
                    $products= Product::orderBy('price', 'ASC')->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;

                case 'price_min':
                    $products = Product::orderBy('price', 'DESC')->with('brand', 'images', 'sale')
                    ->where('category_id', $id)
                    ->paginate(9);
                    break;
            }
        }
        $data =[
            'products',
            'brands',
            'categories',
            'category',
            'news'
        ];

        return view('categories.list-products', compact($data));
    }
}
