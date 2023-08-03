<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\MonthlyPayment;

class MonthlyPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MonthlyPayment::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $monthlyPayment = new MonthlyPayment([
            'title' => $request->title
        ]);
                
        $monthlyPayment->save();        
        return response()->json('The monthlyPayment successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $monthlyPayment = MonthlyPayment::find($id);
        $monthlyPayment->title = $request['title'];       

        $monthlyPayment->save();
        return response()->json(["The monthlyPayment successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $monthlyPayment = MonthlyPayment::find($id);
        $monthlyPayment->delete();        

        return response()->json('The monthlyPayment successfully deleted');
    }
}
