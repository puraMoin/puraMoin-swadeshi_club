<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableSize;

class AvailableSizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Available Size';
        $parentMenu = 'Product Master';
        $availablesizes = AvailableSize::all();

        return view('availablesizes.index',compact('parentMenu','pageTitle','availablesizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Available Color";
        $parentMenu = 'Product Master';

        return view('availablesizes.create',compact('parentMenu','pageTitle'));
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
            'name' => ['required']    
            ]);

         $availablesize = AvailableSize::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         return redirect()->route('availablesizes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $availablesize = AvailableSize::find($id);

        if (!$availablesize) {
            return redirect()->route('availablesizes.index')->with('error', 'Size not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = "Available Size";
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('availablesizes.show', compact('availablesize','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $availablesize = AvailableSize::findOrFail($id);
        $pageTitle = "Edit";
        $parentMenu = 'Product Master';
        return view('availablesizes.edit',compact('parentMenu','pageTitle','availablesize'));
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
        $availablesize = AvailableSize::find($id);

        if (!$availablesize) {
            return redirect()->route('availablesizes.index')->with('error', 'Size not found.');
         }

       // Update the role information
        $availablesize->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

    return redirect()->route('availablesizes.index');
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
