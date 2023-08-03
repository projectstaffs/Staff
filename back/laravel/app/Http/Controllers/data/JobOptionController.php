<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\JobOption;

class JobOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JobOption::orderBy('created_at', 'desc')->get();
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
        $jobOption = new JobOption([
            'title' => $request->title
        ]);
                
        $jobOption->save();        
        return response()->json('The jobOption successfully added');
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
        $jobOption = JobOption::find($id);
        $jobOption->title = $request['title'];       

        $jobOption->save();
        return response()->json(["The jobOption successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobOption = JobOption::find($id);
        $jobOption->delete();        

        return response()->json('The jobOption successfully deleted');
    }
}
