<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class ProductController extends Controller
{
    public function products(){

        $products = Product::latest()->paginate(5);
        return view('products', [
            'products' =>$products,
        ]);
    }


    // add product
    public function add_product(Request $request){

        $request->validate(
            [
                'name'=>'required|unique:products',
                'price'=>'required',
            ],
            [
                'name.required'=>'Name is Required',
                'name.unique'=>'Product Already Exists',
                'price.required'=>'Price is Required',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'=>'success',
        ]);

    }

    // update product
    public function update_product(Request $request){

        $request->validate(
            [
                'up_name'=>'required|unique:products,name,'.$request->up_id,
                'up_price'=>'required',
            ],
            [
                'up_name.required'=>'Name is Required',
                'up_name.unique'=>'Product Already Exists',
                'up_price.required'=>'Price is Required',
            ]
        );

        Product::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price,
        ]);
        return response()->json([
            'status'=>'success',
        ]);

    }

    // delete product

    public function delete_product(Request $request){
        Product::findOrFail($request->product_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);

    }

    // pagination
    public function pagination(Request $request){
        $products = Product::latest()->paginate(5);
        return view('pagination_products', [
            'products' =>$products,
        ])->render();

    }

    // search
    public function search_product(Request $request){
        $products = Product::where('name', 'like', '%'.$request->search_string.'%')
        ->orWhere('price', 'like', '%'.$request->search_string.'%')
        ->orderBy('id','desc')
        ->paginate(5);

        if($products->count() >= 1){
            return view('pagination_products', [
                'products' =>$products,
            ])->render();

        }else{
            return response()->json([
                'status'=>'nothing_found',
            ]);
        }

    }
}
