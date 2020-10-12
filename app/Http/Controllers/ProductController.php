<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Price;
use App\Models\Seller;

use App\Http\Resources\ProductResource;

use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function hi(){
        return 'Hi';
    }

    public function add() {
        $product = new Product([
            'model_no'=>9546,
            'brand'=>'Mi',
        ]);
        $product->save();

        return $product;
    }

    public function update(Request $request) {
        $product = Product::find($request->product_id);
        $product->brand = $request->brand_name;
        $product->save();

        return $product;
    }


    public function all() {
        $products = Product::get();
        return $products;
    }
    
    public function singleProduct(Request $request) {
        $product = Product::find($request->product_id);

        return $product;
    }

    public function deleteSingleProduct(Request $request) {
        $product = Product::find($request->product_id);
        $product->delete();

        return $product;
    }

    public function drop(){
        Schema::drop('users');

        return 'Success';    
    }


    // with relation


    
    public function addWithPrice() {
        $product = new Product([
            'model_no'=>9546,
            'brand'=>'Mi',
        ]);
        $product->save();


        $product_price = new Price([
            'mrp' => 50000,
            'selling_price' => 40000,
            'product_id' => $product->id,
        ]);
        $product_price->save();


        return $product_price;
    }


    
    public function singleProductWithPrice(Request $request) {
        $product = Product::with('price')->find($request->product_id);

        return $product;
    }

    
    public function addWithPriceAndSellers(Request $request) {
        $product = new Product([
            'model_no'=>1324,
            'brand'=>'Oppo',
        ]);
        $product->save();

        $product_price = new Price([
            'mrp' => 50000,
            'selling_price' => 40000,
            'product_id' => $product->id,
        ]);
        $product_price->save();

        $seller1 = new Seller([
            'name' => 'Amir',
            'product_id' => $product->id,
        ]);
        $seller1->save();

        $seller2 = new Seller([
            'name' => 'Komal',
            'product_id' => $product->id,
        ]);
        $seller2->save();

        return $product;
    }

    
    
    public function singleProductWithPriceAndSellers(Request $request) {
        $product = Product::with('price', 'sellers')->find($request->product_id);

        return $product;
    }

    
    public function singleProductWithPriceAndSellersFormatted(Request $request) {
        $product = Product::with('price', 'sellers')->find($request->product_id);

        return new ProductResource($product);
    }
}








// ->    .       
// =>    =      


// product = {
//     name: 'amir',
//     last_name: 'shaikh'
// }

// product.name

// product->name