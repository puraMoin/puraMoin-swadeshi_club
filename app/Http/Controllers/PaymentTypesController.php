<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentType;


class PaymentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Payment Types';
        $parentMenu = 'Product Master';

        $paymenttypes = PaymentType::all();

        return view('paymenttypes.index',compact('parentMenu','pageTitle','paymenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';

        return view('paymenttypes.create',compact('pageTitle'));
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

        $paymenttypes = PaymentType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('paymenttypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymenttypes = PaymentType::find($id);

        if (!$paymenttypes) {
            return redirect()->route('paymenttypes.index')->with('error', 'Payment Type not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Payment Types';
        $parentMenu = 'Product Master';

        // You can pass the data to a view and display it
        return view('paymenttypes.show', compact('paymenttypes','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymenttypes = PaymentType::findOrFail($id);

        $parentMenu = 'Product Master';
    
        $pageTitle = "Edit";
        return view('paymenttypes.edit',compact('parentMenu','pageTitle','paymenttypes'));
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
        $paymenttypes = PaymentType::findOrFail($id);

        $request->validate([
            'name' => ['required']        
        ]);

        $paymenttypes->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('paymenttypes.index');
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
