<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $products = Product::all();
        return view('product.productdashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$products = Product::all();
        //return view('product.createproduct', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|max:30',
            'selling_price' => 'required',
            'quantity' => 'required|numeric',
            'potency' => 'required|numeric',
            'expiry_date' => 'required',
            'type' => 'required|string',
            'brand' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        $addItem = new Product;

        $addItem->name          = $request->input('name');
        $addItem->selling_price = $request->input('selling_price');
        $addItem->quantity      = $request->input('quantity');
        $addItem->potency       = $request->input('potency');
        $addItem->expiry_date   = $request->input('expiry_date');
        $addItem->brand         = $request->input('brand');
        $addItem->description   = $request->input('description');
        $addItem->type          = $request->input('type');
        
        $addItem->save();

        return redirect('/product')->with('success', 'Product added Successfully!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product->delete();
        return redirect('/product')->with('success','Product deleted Successfully!');
    }
}