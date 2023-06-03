<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('id','desc')->get();
        return view('product.index',['products'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $shop = DB::table('shops')->get();

        return view('product.create',['shops'=>$shop]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_name'  => 'required',
            'product_price' => 'required',
            'image'         => 'required',
        ]);


        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = uniqid(rand().time()).'.'.$extension;
            $file->move('image/',$imageName);
        }

        $brands = Product::create([
            'name'  => $request->product_name,
            'price' => $request->product_price,
            'shop_id' => $request->shops,
            'image' => $imageName
        ]);

        return back()->with('success','Brand has been Saved');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
