<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $products;
    protected $name;

    public function index()
    {
        return view('product.add');
    }
    public function createProduct(Request $request)
    {
        $this->product = new Product();
        $this->product->name = $request->name;
        $this->product->category = $request->category;
        $this->product->brand = $request->brand;
        $this->product->price = $request->price;
        $this->product->description = $request->description;

        $image = $request->file('image');

        $this->product->save();

        return redirect()->back()->with('massage', 'product info save successfully');
    }
    public function manageProduct()
    {

        $this->products = Product::orderBy('id','desc')->get();

        return view('product.manage-product',['products'=> $this->products]);


    }
    public function updateProduct(Request $request ,$id)
    {
        $this->product = Product::find($id);
        $this->product->name = $request->name;
        $this->product->category = $request->category;
        $this->product->brand= $request->brand;
        $this->product->price= $request->price;
        $this->product->description= $request->description;
        $this->product->save();

        return redirect('/manage-product')->with('massage','product info update successfully');
    }
    public function editProduct($id)
    {

        $this->product = Product::find($id);
        return view('product.edit-product',['product' => $this->product]);
    }
    public function deleteProduct($id)
    {
        $this->product = Product::find($id);
        $this->product->delete();
        return redirect('/manage-product')->with('massage','product info delete successfully');

    }
}
