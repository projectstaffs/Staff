<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\NursingSkill;

class NursingSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NursingSkill::orderBy('created_at', 'desc')->get();
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
        $nursingSkill = new NursingSkill([
            'title' => $request->title
        ]);
                
        $nursingSkill->save();        
        return response()->json('The nursingSkill successfully added');
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
        $nursingSkill = NursingSkill::find($id);
        $nursingSkill->title = $request['title'];       

        $nursingSkill->save();
        return response()->json(["The nursingSkill successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nursingSkill = NursingSkill::find($id);
        $nursingSkill->delete();        

        return response()->json('The nursingSkill successfully deleted');
    }
}
