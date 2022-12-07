<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\{User,Category};
use Carbon\Carbon;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
            'category_name' => 'required',
            'category_image' => 'required'
        ]);

        $new_name = $request->category_name.'_'.time().'.'.$request->file('category_image')->getclientoriginalextension();
        $img = Image::make($request->file('category_image'))->resize(200, 256);
        $img->save(base_path('public/uploads/category_image/'.$new_name), 80);

        if($request->category_slug){
            $category_slug = $request->category_slug;
        }else{
            $category_slug = $request->category_name;
        }

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($category_slug, '-'),
            'category_image' => $new_name,
            'created_at' => Carbon::now()
        ]);

        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
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
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug
        ]);

        if($request->hasfile('category_image')){
            unlink(base_path('public/uploads/category_image/'.Category::find($id)->category_image));
        }

        $new_name = $request->category_name.'_'.time().'.'.$request->file('category_image')->getclientoriginalextension();
        $img = Image::make($request->file('category_image'))->resize(200, 256);
        $img->save(base_path('public/uploads/category_image/'.$new_name), 80);

        Category::find($id)->update([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'category_image' => $new_name
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
