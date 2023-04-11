<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends EloquentRepository
{
    public function getModel()
    {
        return  Category::class;
    }

    public function deleteX($id)
    {
        $category = $this->find($id);
        // Cate has parent_id
        if (!$category->parent_id) {
            $children =  $this->find($id)->load('children')->children;
            foreach ($children as $child) {
                $childCategory =  $this->find($child->id);
                foreach ($childCategory->products as $value) {
                    $product = Product::with('orders')->find($value->id);
                    if (count($product->orders) == 0) {
                        $product->delete();
                        $childCategory->delete();
                        $category->delete();
                    }else{
                        return redirect()->route('admin.categories.list')
                            ->with('warning', 'This category has product in orders!!!');
                    }
                }
            }
        } else { // Cate has no parent_id
            $category->products()->delete();
            $category->delete();
        }
        return redirect()->route('admin.categories.list')
                            ->with('delete', 'Category deleted successfully!');

    }


    public function cate_parent($data, $parent_id = 0, $str = "", $select = 0)
    {
        $string = "";
        foreach ($data as $value) {
            $id = $value['id'];
            $name = $value['name'];
            if ($value['parent_id'] == $parent_id) {
                if ($select != 0 && $id = $select) {
                    $string .= "<option value='$id' selected>$str $name</option>";
                } else {
                    $string .= "<option value='$id'>$str $name</option>";
                }
                $string .= $this->cate_parent($data, $id, $str . "--");
            }
        }
        return $string;
    }
}
