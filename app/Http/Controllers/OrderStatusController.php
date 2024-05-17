<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Order Status';
        $parentMenu = 'Product Master';

        $orderstatus = OrderStatus::all();

        return view('orderstatus.index',compact('parentMenu','pageTitle','orderstatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';

        return view('orderstatus.create',compact('pageTitle'));
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

        $orderstatus = OrderStatus::create([
            'name' => $request->input('name'),
            'background' => $request->input('background'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('orderstatus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderstatus = OrderStatus::find($id);

        if (!$orderstatus) {
            return redirect()->route('orderstatus.index')->with('error', 'Order Status not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Order Status';
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('orderstatus.show', compact('orderstatus','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderstatus = OrderStatus::findOrFail($id);

        $parentMenu = 'Product Master';
    
        $pageTitle = "Edit";
        return view('orderstatus.edit',compact('parentMenu','pageTitle','orderstatus'));
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
        //
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
