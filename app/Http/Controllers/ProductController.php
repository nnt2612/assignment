<?php
/**
 * Created by PhpStorm.
 * User: xuanhung
 * Date: 7/14/18
 * Time: 8:32 AM
 */

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{

    function index(){
        $lipsticks = Product::all();
        return view('product') -> with('lipsticks', $lipsticks);
    }

    function create()
    {
        return view('product.form');
    }

    function show($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return view('404');
        }
        return view('/product.show')
            ->with('product', $product);
    }

    function store()
    {
        $product = new Product();
        $product->name = Input::get('name');
        $product->description = Input::get('description');
        $product->price = Input::get('price');
        $product->image = Input::get('thumbnail');
        $product->save();
        return redirect('/product');
    }

    function edit($id){
        $product = Product::find($id);
        if($product == null){
            return 'Sản phẩm không tồn tại hoặc đã bị xoá.';
        }
        return view('product.edit')->with('product', $product);
    }

    function update($id){
        $product = Product::find($id);
        if($product == null){
            return 'Sản phẩm không tồn tại hoặc đã bị xoá.';
        }
        $product->name = Input::get('name');
        $product->description = Input::get('description');
        $product->price = Input::get('price');
        $product->image = Input::get('thumbnail');
        $product->save();
        return redirect('/product');
    }
}