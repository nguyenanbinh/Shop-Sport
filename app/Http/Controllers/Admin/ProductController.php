<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Repositories\Eloquent\ProductRepository;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $product)
    {
        // $this->middleware('is.admin');
        $this->productRepo = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('images')->orderBy('id', 'DESC')->paginate(5);

        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $brands = Brand::all();
        $sales = Sale::all();
        return view(
            'admin.products.create',
            compact(['categories', 'brands', 'sales'])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        $img = $request->img_product;
        $this->productRepo->create($data);
        $product = Product::orderBy('id', 'desc')->first();
        if ($img) {
            $data_img =   [
                'path' => $img,
                'imageable_id' => $product->id,
                'imageable_type' => 'App\Models\Product'
            ];
            Image::create($data_img);
        }

        return redirect()->route('admin.products.list')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->find($id);
        $brands = Brand::all();
        $sales = Sale::all();
        return view('admin.products.edit', compact(['product', 'brands', 'sales']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->productRepo->find($id);
        $data = $request->except(['img_product', 'old_img_id']);
        // dd($request->old_img_id);

        if ($request->img_product) {
            // Update new image to Image DB
            if ($request->old_img_id) {
                Image::find($request->old_img_id)->update(
                    [
                        'path' => $request->img_product,
                        'imageable_id' => $id,
                        'imageable_type' => 'App\Models\Product'
                    ]
                );
            }
            //Update Product
            $product->update($data);
        } else {

            $product->update($data);
        }

        return redirect()->route('admin.products.list')
            ->with('update', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::with('orders')->find($id);
        if (count($product->orders) == 0) {
            $product->delete();
            return redirect()->route('admin.products.list')
                ->with('delete', 'Product deleted successfully!');
        } else {
            return redirect()->route('admin.products.list')
                ->with('warning', 'Existing product in orders');
        }
    }

    public function productDetail($id)
    {
        $product = Product::with('sale', 'category')->find($id);
        // $sale = Sale::with('products')->find($id);

        return view('admin.products.detail', compact(['product']));
    }

    public function searchByName(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($products);
    }

    public function searchAll(Request $request)
    {
        $products = Product::where('email', 'like', '%' . $request->q . '%')
            ->orWhere('name', 'like', '%' . $request->q . '%')
            ->paginate(3);

        // dd();
        return view('admin.users.listSearch', compact('users'));
    }
}
