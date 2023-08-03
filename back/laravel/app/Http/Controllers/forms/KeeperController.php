<?php

namespace App\Http\Controllers\forms;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\forms\Keeper;
use App\Http\Resources\KeeperResource;

class KeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keeper = Keeper::where('user_id', $request["data"])->first();
        if($keeper) { 
            return new KeeperResource($keeper);            
        }
        else { return null; }
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
        $keeper = new Keeper([
            'user_id' => $request->user_id,
            'keeper_exp' => $request->keeper_exp,
            'experience_id' => $request->experience_id,
            'recommendation_id' => $request->recommendation_id,            
            'workperiod_id' => $request->workperiod_id,
            'employment_id' => $request->employment_id,          
            'technique' => $request->technique,
            'material' => $request->material,
            'baby_keeper' => $request->baby_keeper,
            'nurse_keeper' => $request->nurse_keeper,            
            'hourpay_id' => $request->hourpay_id,
            'monthpay_id' => $request->monthpay_id,
            'additional' => $request->additional,
            'confirmed' => $request->confirmed,
        ]);                
        $keeper->save();

        return $keeper;
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
        $keeper = Keeper::find($id);       
        $keeper->keeper_exp = $request['keeper_exp'];
        $keeper->experience_id = $request['experience_id'];
        $keeper->recommendation_id = $request['recommendation_id'];        
        $keeper->workperiod_id = $request['workperiod_id'];
        $keeper->employment_id = $request['employment_id'];        
        
        $keeper->technique = $request['technique'];
        $keeper->material = $request['material'];
        $keeper->baby_keeper = $request['baby_keeper'];
        $keeper->nurse_keeper = $request['nurse_keeper'];
        
        $keeper->hourpay_id = $request['hourpay_id'];
        $keeper->monthpay_id = $request['monthpay_id'];
        $keeper->additional = $request['additional'];
        $keeper->save(); 

        return $keeper;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Keeper::where('user_id', '=', $id)->delete();
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
