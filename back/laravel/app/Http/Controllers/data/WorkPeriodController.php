<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\WorkPeriod;

class WorkPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WorkPeriod::orderBy('created_at', 'desc')->get();
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
        $workPeriod = new WorkPeriod([
            'title' => $request->title
        ]);
                
        $workPeriod->save();        
        return response()->json('The workPeriod successfully added');
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
        $workPeriod = WorkPeriod::find($id);
        $workPeriod->title = $request['title'];       

        $workPeriod->save();
        return response()->json(["The workPeriod successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workPeriod = WorkPeriod::find($id);
        $workPeriod->delete();        

        return response()->json('The workPeriod successfully deleted');
    }
}
