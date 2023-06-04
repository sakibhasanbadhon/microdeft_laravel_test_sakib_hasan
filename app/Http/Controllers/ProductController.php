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

        return back()->with('success','Product has been Saved');
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
        $shop = DB::table('shops')->get();
        $product = Product::findOrFail($id);
        return view('product.edit',['products'=> $product,'shops'=>$shop]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'  => 'image|mimes:jpg,jpeg,png',
        ]);


        $product = Product::findOrFail($id);
         // image upload
         if ($request->has('image')) {
            file_exists('image/'.$product->image) ? unlink('image/'.$product->image) : false;
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = uniqid(rand().time()).'.'.$extension;
            $file->move('image/',$imageName);
        }else{
            $imageName = $product->image;
        }


        $product->update([
            'name'        => $request->product_name,
            'image'       => $imageName,
            'price'       => $request->product_price,
            'shop_id'      => $request->shops
        ]);


        return back()->with('success','Product has been Updated.');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        unlink('image/'.$product->image);
        $product->delete();

        return back()->with('success','Product has been Deleted.');
    }


}
