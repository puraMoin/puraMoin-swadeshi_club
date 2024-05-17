<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Category';
        $parentMenu = 'Product Master';
        $categories = Category::all();

        return view('categories.index',compact('parentMenu','pageTitle','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Category';
        $parentMenu = 'Product Master';

         return view('categories.create',compact('parentMenu','pageTitle'));
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
            'title' => ['required'],       
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'title' => $request->input('title'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'active' => $request->input('active'),
            'display_home_page' => $request->input('display_home_page'),
            'description' => $request->input('description'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
        if ($request->hasFile('smal_image')) {

            $image = $request->file('smal_image');   

            $folder = 'images/category/smal_image/'.$category->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $category->smal_image = $image->getClientOriginalName();

           }

           if ($request->hasFile('big_image')) {

            $image = $request->file('big_image');   

            $folder = 'images/category/big_image/'.$category->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $category->big_image = $image->getClientOriginalName();

           }

           $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Category';
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('categories.show', compact('category','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $parentMenu = 'Product Master';
    
        $pageTitle = "Edit";
        return view('categories.edit',compact('parentMenu','pageTitle','category'));
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
        $category = Category::find($id);

        if (!$category) {
          return redirect()->route('categories.index')->with('error', 'Category not found.');
       }

      $category->update([
        'name' => $request->input('name'),
        'alias' => $request->input('alias'),
        'title' => $request->input('title'),
        'page_title' => $request->input('page_title'),
        'page_slug' => $request->input('page_slug'),
        'page_url' => $request->input('page_url'),
        'active' => $request->input('active'),
        'display_home_page' => $request->input('display_home_page'),
        'description' => $request->input('description'),
        'meta_title' => $request->input('meta_title'),
        'meta_description' => $request->input('meta_description'),
        'created_at' => now(), // Set the created timestamp
        'updated_at' => now(),
      ]);

         // Handle image uploads
         if ($request->hasFile('smal_image')) {

            $image = $request->file('smal_image');   

            $folder = 'images/category/smal_image/'.$category->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $category->smal_image = $image->getClientOriginalName();

           }

           if ($request->hasFile('big_image')) {

            $image = $request->file('big_image');   

            $folder = 'images/category/big_image/'.$category->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $category->big_image = $image->getClientOriginalName();

           }

           $category->save();

        return redirect()->route('categories.index');
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
