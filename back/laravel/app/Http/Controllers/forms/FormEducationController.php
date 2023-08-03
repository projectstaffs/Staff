<?php

namespace App\Http\Controllers\forms;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\forms\FormEducation;

class FormEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        for($i = 0; $i < $request[1]; ++$i) {
            $formEducation = new FormEducation([
                'form_id' => $request[0][$i]["form_id"],
                'education_id' => $request[0][$i]["education_id"]
            ]);                    
            $formEducation->save();
        }        
        return $request[1];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FormEducation::where('form_id', '=', $id)->delete();
        return response()->json('Удаление прошло успешно.');
    }
}
