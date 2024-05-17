<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableColor;

class AvailableColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Available Color';
        $parentMenu = 'Product Master';
        $availablecolors = AvailableColor::all();

        return view('availablecolors.index',compact('parentMenu','pageTitle','availablecolors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                
        $pageTitle = "Available Color";
        $parentMenu = 'Product Master';

         return view('availablecolors.create',compact('parentMenu','pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required'],
            'color_code'=>['required']     
            ]);

         $availablecolor = AvailableColor::create([
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         return redirect()->route('availablecolors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $availablecolor = AvailableColor::find($id);

        if (!$availablecolor) {
            return redirect()->route('availablecolors.index')->with('error', 'Color not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = "Available Color";
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('availablecolors.show', compact('availablecolor','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $availablecolor = AvailableColor::findOrFail($id);
        $pageTitle = "Edit";
        $parentMenu = 'Product Master';
        return view('availablecolors.edit',compact('parentMenu','pageTitle','availablecolor'));
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
        $availablecolor = AvailableColor::find($id);

        if (!$availablecolor) {
            return redirect()->route('availablecolors.index')->with('error', 'Color not found.');
         }

       // Update the role information
        $availablecolor->update([
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

    return redirect()->route('availablecolors.index');
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
