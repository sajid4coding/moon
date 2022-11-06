<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category, User};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index',[
            // 'products' => Product::where('vendor_id', auth()->id())->get(),
            'products' => Product::all(),
            'trash_products' => Product::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create',[
            'categories' => Category::get(['id', 'category_name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'purchase_price' => 'required',
            'regular_price' => 'required'
        ]);

        if($request->hasFile('thumbnail')){
            $product_image = auth()->id().'_'.time().'.'.$request->file('thumbnail')->getclientoriginalextension();
            $img = Image::make($request->file('thumbnail'))->resize(800, 609);
            $img->save(base_path('public/uploads/product_thumbnail/'.$product_image), 80);

            Product::insert($request->except('_token','thumbnail') + [
                'vendor_id' => auth()->user()->id,
                'created_at' => Carbon::now(),
                'thumbnail' => $product_image,
            ]);
        }else{
            Product::insert($request->except('_token','thumbnail') + [
                'vendor_id' => auth()->user()->id,
                'created_at' => Carbon::now(),
            ]);
        }

        return redirect('product')->with('product_added', 'Product Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::onlyTrashed()->where('id', $id)->restore();;
        return back()->with('restore_message', 'Product Restored');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with('delete_message', 'Product Deleted');
    }

    public function inventory(Product $product)
    {
        return view('dashboard.product.inventory', compact('product'));
    }
}
