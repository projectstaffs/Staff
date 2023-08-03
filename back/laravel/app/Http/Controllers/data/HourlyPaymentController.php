<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\HourlyPayment;

class HourlyPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HourlyPayment::orderBy('created_at', 'desc')->get();
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
        $hourlyPayment = new HourlyPayment([
            'title' => $request->title
        ]);
                
        $hourlyPayment->save();        
        return response()->json('The hourlyPayment successfully added');
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
        $hourlyPayment = HourlyPayment::find($id);
        $hourlyPayment->title = $request['title'];       

        $hourlyPayment->save();
        return response()->json(["The hourlyPayment successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hourlyPayment = HourlyPayment::find($id);
        $hourlyPayment->delete();        

        return response()->json('The hourlyPayment successfully deleted');
    }
}
