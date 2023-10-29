<?php

namespace App\Http\Controllers\Forms;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Forms\Nurse;
use App\Http\Resources\Forms\NurseResource;
use App\Http\Requests\Worker\NurseRequest;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('nurses')) { Cache::put('nurses', Nurse::all()); }
        $Nurse = Cache::get('nurses');
        $nurse = null;
        foreach ($Nurse as $item) {
            if($item->user_id == $request["data"]) {
                $nurse = $item;
                break;
            }                           
        }

        //$nurse = Nurse::where('user_id', $request["data"])->first();
        if($nurse) { return new NurseResource($nurse);}
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
    public function store(NurseRequest $request)
    {
        $nurse = new Nurse([
            'user_id' => $request->user_id,
            'nurse_exp' => $request->nurse_exp,
            'experience_id' => $request->experience_id,
            'recommendation_id' => $request->recommendation_id,
            'education_about' => $request->education_about,
            'workperiod_id' => $request->workperiod_id,
            'employment_id' => $request->employment_id,            
            'hourpay_id' => $request->hourpay_id,
            'monthpay_id' => $request->monthpay_id,
            'additional' => $request->additional,
            'confirmed' => $request->confirmed,
        ]);                
        $nurse->save();

        Cache::put('nurses', Nurse::all());
        return $nurse;
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
    public function update(NurseRequest $request, string $id)
    {
        $nurse = Nurse::find($id);       
        $nurse->nurse_exp = $request['nurse_exp'];
        $nurse->experience_id = $request['experience_id'];
        $nurse->recommendation_id = $request['recommendation_id'];
        $nurse->education_about = $request['education_about'];
        $nurse->workperiod_id = $request['workperiod_id'];
        $nurse->employment_id = $request['employment_id'];        
        $nurse->hourpay_id = $request['hourpay_id'];
        $nurse->monthpay_id = $request['monthpay_id'];
        $nurse->additional = $request['additional'];
        $nurse->save(); 

        Cache::put('nurses', Nurse::all());
        return $nurse;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Nurse::where('user_id', '=', $id)->delete();
        Cache::put('nurses', Nurse::all());
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
