<?php

namespace App\Http\Controllers\forms;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\forms\Baby;
use App\Http\Resources\forms\BabyResource;
use App\Http\Requests\worker\BabyRequest;

class BabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('babies')) { Cache::put('babies', Baby::all()); }
        $Baby = Cache::get('babies');
        $baby = null;
        foreach ($Baby as $item) {
            if($item->user_id == $request["data"]) {
                $baby = $item;
                break;
            }                           
        }

        //$baby = Baby::where('user_id', $request["data"])->first();
        if($baby) { return new BabyResource($baby); }
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
    public function store(BabyRequest $request)
    {
        $baby = new Baby([
            'user_id' => $request->user_id,
            'baby_exp' => $request->baby_exp,
            'experience_id' => $request->experience_id,
            'recommendation_id' => $request->recommendation_id,
            'education_about' => $request->education_about,
            'workperiod_id' => $request->workperiod_id,
            'employment_id' => $request->employment_id,
            'childrencount_id' => $request->childrencount_id,                                    
            'children_invalid' => $request->children_invalid,
            'hourpay_id' => $request->hourpay_id,
            'monthpay_id' => $request->monthpay_id,
            'additional' => $request->additional,
            'confirmed' => $request->confirmed,
        ]);                
        $baby->save();

        Cache::put('babies', Baby::all());
        return $baby;        
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
    public function update(BabyRequest $request, string $id)
    {        
        $baby = Baby::find($id);       
        $baby->baby_exp = $request['baby_exp'];
        $baby->experience_id = $request['experience_id'];
        $baby->recommendation_id = $request['recommendation_id'];
        $baby->education_about = $request['education_about'];
        $baby->workperiod_id = $request['workperiod_id'];
        $baby->employment_id = $request['employment_id'];
        $baby->childrencount_id = $request['childrencount_id'];                                    
        $baby->children_invalid = $request['children_invalid'];
        $baby->hourpay_id = $request['hourpay_id'];
        $baby->monthpay_id = $request['monthpay_id'];
        $baby->additional = $request['additional'];
        $baby->save(); 

        Cache::put('babies', Baby::all());
        return $baby;        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Baby::where('user_id', '=', $id)->delete();
        Cache::put('babies', Baby::all());
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
