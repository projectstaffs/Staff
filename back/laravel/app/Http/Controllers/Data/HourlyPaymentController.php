<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\HourlyPayment;

class HourlyPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('hourlypayments')) { Cache::put('hourlypayments', HourlyPayment::all()); }
        $getItems = Cache::get('hourlypayments');
        return $getItems;
        //return HourlyPayment::orderBy('created_at', 'desc')->get();
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
            'title' => [
               'en' => $request->en,
               'ua' => $request->ua
            ],
        ]);
        $hourlyPayment->save();  
        
        Cache::put('hourlypayments', HourlyPayment::all());
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
        $hourlyPayment->title = [
               'en' => $request->title['en'],
               'ua' => $request->title['ua']
            ];
        $hourlyPayment->save();

        Cache::put('hourlypayments', HourlyPayment::all());
        return response()->json(["The hourlyPayment successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hourlyPayment = HourlyPayment::find($id);
        $hourlyPayment->delete();        

        Cache::put('hourlypayments', HourlyPayment::all());
        return response()->json('The hourlyPayment successfully deleted');
    }
}
