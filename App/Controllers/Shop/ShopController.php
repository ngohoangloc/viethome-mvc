<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;
use App\Http\Response;
use App\Http\Request;
use App\Http\Paginator;
use App\Models\Product;

class ShopController extends BaseController
{
    public function index()
    {

        $products = Product::paginate($this->getPerPage());
        $total = Product::count();


        $paginator = new Paginator($this->request, $products, $total);

        $paginator->onEachSide(2);

        return $this->render('shop/product-list', [
            'products' => $products,
            'paginator' => $paginator,
        ]);
    }
}
