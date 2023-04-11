<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Eloquent\CategoryRepository;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Order;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $category)
    {
        // $this->middleware('is.admin');
        $this->categoryRepo = $category;
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        //    foreach ($categories as $value) {
        //       if(!$value->parent_id){
        //           dd('sadsa');
        //       }
        //    }
        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        $categories = Category::with('children')->get();

        $c = Category::select('id', 'name', 'parent_id')->get()->toArray();
        $x = $this->categoryRepo->cate_parent($c);

        // dd($x);
        return view('admin.categories.create', compact('categories', 'x'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $this->categoryRepo->create($request->all());

        return redirect()->route('admin.categories.list')
            ->with('success', 'Category created successfully!');
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
    public function edit($id)
    {
        $category = $this->categoryRepo->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::enableQueryLog();
        $category = $this->categoryRepo->find($id);
        $data = $request->only('name');
        $category->update($data);
        return redirect()->route('admin.categories.list')
            ->with('update', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->categoryRepo->deleteX($id);
    }

    public function listProductByCategoryID($id)
    {

        $category = Category::with('products')->find($id);

        return view('admin.categories.list-product', compact('category'));
    }
}
