<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\ProductType;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Product Type';
        $parentMenu = 'Product Master';
        $producttypes = ProductType::with(['category','subcategory'])->get();

        //dd($subcategories);    

        return view('producttypes.index',compact('parentMenu','pageTitle','producttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Product Type';
        $parentMenu = 'Product Master';

        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('producttypes.create',compact('parentMenu','pageTitle','categories','subcategories'));
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
            'name' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],       
        ]);

        
        $categoryName = $request->input('category_id');

        $category = Category::where('name', $categoryName)->first();
        if(!empty($category))
        {
            $category_id = $category->id;
        } 

        $subcategoryName = $request->input('sub_category_id');

        $subcategory = SubCategory::where('name', $subcategoryName)->first();

        if(!empty($subcategory))
        {
            $subcategory_id = $subcategory->id;
        } 

        $producttype = ProductType::create([
            'name' => $request->input('name'),
            'category_id' => $category_id, 
            'sub_category_id' => $subcategory_id, 
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'canonical_url' => $request->input('canonical_url'),
            'active' => $request->input('active'),
            'display_home_page' => $request->input('display_home_page'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
           if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/producttype/image_file/'.$producttype->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $producttype->image_file = $image->getClientOriginalName();

           }

           $producttype->save();

        return redirect()->route('producttypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producttype = ProductType::find($id);

        //dd($subcategory);

        if (!$producttype) {
            return redirect()->route('producttypes.index')->with('error', 'ProductType not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Product Type';
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('producttypes.show', compact('producttype','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = ProductType::find($id);

        $category = Category::where('id', $producttype->category_id)->first(); 

        $categories = Category::where('id', '!=', $category->id)->get();

        $subcategory = SubCategory::where('id', $producttype->sub_category_id)->first(); 

        $subcategories = SubCategory::where('id', '!=', $subcategory->id)->get();

        // Retrieve additional details if needed
        $pageTitle = 'Product Type';
        $parentMenu = 'Product Master';

        return view('producttypes.edit', compact('producttype','pageTitle','parentMenu','category',
                                                        'categories','subcategory','subcategories'));
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

        $request->validate([
            'name' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],       
        ]);

        $producttype = ProductType::find($id);
        
        $categoryName = $request->input('category_id');

        $category = Category::where('name', $categoryName)->first();
        if(!empty($category))
        {
            $category_id = $category->id;
        } 

        $subcategoryName = $request->input('sub_category_id');

        $subcategory = SubCategory::where('name', $subcategoryName)->first();

        if(!empty($subcategory))
        {
            $subcategory_id = $subcategory->id;
        } 

        $producttype->update([
            'name' => $request->input('name'),
            'category_id' => $category_id, 
            'sub_category_id' => $subcategory_id, 
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'canonical_url' => $request->input('canonical_url'),
            'active' => $request->input('active'),
            'display_home_page' => $request->input('display_home_page'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
           if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/producttype/image_file/'.$producttype->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $producttype->image_file = $image->getClientOriginalName();

           }

           $producttype->save();

        return redirect()->route('producttypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
