<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Brand';
        $parentMenu = 'Product Master';

        $brands = Brand::all();

        return view('brands.index',compact('parentMenu','pageTitle','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pageTitle = 'Add';

        return view('brands.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //dump($request);

        $request->validate([
            'name' => ['required']        
        ]);

        $brand = Brand::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
        if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/brands/image_file/'.$brand->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   

            $brand->image_file = $image->getClientOriginalName();

           }

           $brand->save();

        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->route('brands.index')->with('error', 'Brand not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Brand';
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('brands.show', compact('brand','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        $parentMenu = 'Product Master';
    
        $pageTitle = "Edit";
        return view('brands.edit',compact('parentMenu','pageTitle','brand'));
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
        $brand = brand::find($id);

        if (!$brand) {
          return redirect()->route('brands.index')->with('error', 'brand not found.');
       }

      $brand->update([
          'name' => $request->input('name'),
          'active' => $request->input('active'),
          'created_at' => now(), // Set the created timestamp
          'updated_at' => now(),
      ]);

       // Handle image uploads
       if ($request->hasFile('image_file')) {

        $image = $request->file('image_file');   

        $folder = 'images/brands/image_file/'.$brand->id;

        // Save the image directly to the public folder
        $image->move(public_path($folder), $image->getClientOriginalName());   

        $brand->image_file = $image->getClientOriginalName();

       }

         $brand->save();

      return redirect()->route('brands.index');
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
