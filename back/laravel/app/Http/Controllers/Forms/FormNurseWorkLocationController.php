<?php

namespace App\Http\Controllers\forms;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\forms\FormNurseworklocation;

class FormNurseworklocationController extends Controller
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
            $formDutie = new FormNurseworklocation([
                'form_id' => $request[0][$i]["form_id"],
                'nurseworklocation_id' => $request[0][$i]["nurseworklocation_id"]
            ]);                    
            $formDutie->save();
        } 
        Cache::put('formnurseworklocations', FormNurseworklocation::all());       
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
        FormNurseworklocation::where('form_id', '=', $id)->delete();
        Cache::put('formnurseworklocations', FormNurseworklocation::all());
        return response()->json('Удаление прошло успешно.');
    }
}
