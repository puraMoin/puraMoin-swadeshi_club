<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Sub Category';
        $parentMenu = 'Product Master';
        $subcategories = SubCategory::with('category')->get();

        //dd($subcategories);    

        return view('subcategories.index',compact('parentMenu','pageTitle','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Sub Category';
        $parentMenu = 'Product Master';

        $categories = Category::all();


         return view('subcategories.create',compact('parentMenu','pageTitle','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'name' => ['required']       
        ]);

        
        $categoryName = $request->input('category_id');

        $category = Category::where('name', $categoryName)->first();
        if(!empty($category))
        {
            $category_id = $category->id;
        } 

        $subcategory = SubCategory::create([
            'name' => $request->input('name'),
            'category_id' => $category_id, 
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'active' => $request->input('active'),
            'display_home' => $request->input('display_home'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
           if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/subcategory/image_file/'.$subcategory->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $subcategory->image_file = $image->getClientOriginalName();

           }

           $subcategory->save();

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = SubCategory::find($id);

        //dd($subcategory);

        if (!$subcategory) {
            return redirect()->route('subcategories.index')->with('error', 'Subcategory not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Sub Category';
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('subcategories.show', compact('subcategory','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentMenu = 'Product Master';
        $pageTitle = "Edit";

        $subcategory = SubCategory::find($id);    
        $category = Category::where('id', $subcategory->category_id)->first(); 

        $categories = Category::where('id', '!=', $category->id)->get();

        return view('subcategories.edit',compact('parentMenu','pageTitle','subcategory','category','categories'));
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

        $subcategory = SubCategory::find($id);

        $request->validate([
            'name' => ['required']       
        ]);
 
        $categoryName = $request->input('category_id');

        $category = Category::where('name', $categoryName)->first();

        if(!empty($category))
        {
            $category_id = $category->id;
        } 

        $subcategory->update([
            'name' => $request->input('name'),
            'category_id' => $category_id, 
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'active' => $request->input('active'),
            'display_home' => $request->input('display_home'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
           if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/subcategory/image_file/'.$subcategory->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $subcategory->image_file = $image->getClientOriginalName();

           }

           $subcategory->save();

        return redirect()->route('subcategories.index');
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
