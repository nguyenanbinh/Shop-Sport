<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;
class ProductRepository extends EloquentRepository
{
    public function getModel()
    {
        return  Product::class;
    }



}
