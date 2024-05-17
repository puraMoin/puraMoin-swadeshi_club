<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Product';
        $parentMenu = 'Product Master';
        $products = Product::with(['category','subcategory','producttype','brand'])->get();

        //dd($subcategories);    

        return view('products.index',compact('parentMenu','pageTitle','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Product';
        $parentMenu = 'Product Master';

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $producttypes = ProductType::all();
        $brands = Brand::all();
        $products = Product::all();

        return view('products.create',compact('parentMenu','pageTitle','categories','subcategories','producttypes','products','brands'));
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
            'product_type_id' => ['required'], 
            'brand_id' => ['required'],       
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

        $producttypeName = $request->input('product_type_id');

        $producttype = ProductType::where('name', $producttypeName)->first();
        if(!empty($producttype))
        {
            $producttype_id = $producttype->id;
        } 

        $brandName = $request->input('brand_id');

        $brand = Brand::where('name', $brandName)->first();
        if(!empty($brand))
        {
            $brand_id = $brand->id;
        } 

        $product = Product::create([
            'name' => $request->input('name'),
            'product_code' => $request->input('product_code'),
            'category_id' => $category_id, 
            'sub_category_id' => $subcategory_id, 
            'product_type_id' => $producttype_id,
            'brand_id' => $brand_id, 
            'price' => $request->input('price'),
            'in_stock' => $request->input('in_stock'), 
            'display_home_page' => $request->input('display_home_page'),
            'description' => $request->input('description'),
            'spefication' => $request->input('spefication'),
            'active' => $request->input('active'),
            'is_offer_applicable' => $request->input('is_offer_applicable'),
            'apply_tax' => $request->input('apply_tax'),
            'tax_value' => $request->input('tax_value'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'canonical_url' => $request->input('canonical_url'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
           if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/product/image_file/'.$product->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $product->image_file = $image->getClientOriginalName();

           }

           $product->save();

        return redirect()->route('products.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        //dd($subcategory);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'product not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Product';
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('products.show', compact('product','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::where('id', $product->category_id)->first(); 

        $categories = Category::where('id', '!=', $category->id)->get();

        $subcategory = SubCategory::where('id', $product->sub_category_id)->first(); 
        $subcategories = SubCategory::where('id', '!=', $subcategory->id)->get();

        $producttype = ProductType::where('id', $product->product_type_id)->first(); 
        $producttypes = ProductType::where('id', '!=', $producttype->id)->get();

        $brand = Brand::where('id', $product->brand_id)->first(); 
        $brands = Brand::where('id', '!=', $brand->id)->get();

        // Retrieve additional details if needed
        $pageTitle = 'Product';
        $parentMenu = 'Product Master';

        return view('products.edit', compact('producttype','pageTitle','parentMenu','product','category',
                                    'categories','subcategory','subcategories','producttype','producttypes',
                                    'brand','brands'));
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
        $product = Product::find($id);
         
        $request->validate([
            'name' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'], 
            'product_type_id' => ['required'], 
            'brand_id' => ['required'],       
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

        $producttypeName = $request->input('product_type_id');

        $producttype = ProductType::where('name', $producttypeName)->first();
        if(!empty($producttype))
        {
            $producttype_id = $producttype->id;
        } 

        $brandName = $request->input('brand_id');

        $brand = Brand::where('name', $brandName)->first();
        if(!empty($brand))
        {
            $brand_id = $brand->id;
        } 

        $product->update([
            'name' => $request->input('name'),
            'product_code' => $request->input('product_code'),
            'category_id' => $category_id, 
            'sub_category_id' => $subcategory_id, 
            'product_type_id' => $producttype_id,
            'brand_id' => $brand_id, 
            'price' => $request->input('price'),
            'in_stock' => $request->input('in_stock'), 
            'display_home_page' => $request->input('display_home_page'),
            'description' => $request->input('description'),
            'spefication' => $request->input('spefication'),
            'active' => $request->input('active'),
            'is_offer_applicable' => $request->input('is_offer_applicable'),
            'apply_tax' => $request->input('apply_tax'),
            'tax_value' => $request->input('tax_value'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'canonical_url' => $request->input('canonical_url'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
           if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/product/image_file/'.$product->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $product->image_file = $image->getClientOriginalName();

           }

           $product->save();

        return redirect()->route('products.index');
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

    public function generateSlug(Request $request)
    {
            $name = $request->input('name');
            $slug = Str::slug($name);
            return response()->json(['slug' => $slug]);
    }
}
