<?php

namespace App\Http\Controllers\client;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\client\Client_baby;
use App\Http\Resources\ClientBabyResource;

class ClientBabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $baby = Client_baby::where('user_id', $request["data"])->first();
        if($baby) { return new ClientBabyResource($baby); }
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
        $baby = new Client_baby([
            'user_id' => $request->user_id,
            'confirmed' => $request->confirmed,
            'title' => $request->title,
            'title_about' => $request->title_about,
            'childrencount_id' => $request->childrencount_id,            
            'workperiod_id' => $request->workperiod_id,
            'employment_id' => $request->employment_id,
            'drive' => $request->drive,
            'agents' => $request->agents,
            'hourpay_id' => $request->hourpay_id,
            'monthpay_id' => $request->monthpay_id
        ]);                
        $baby->save();

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
    public function update(Request $request, string $id)
    {
        $baby = Client_baby::find($id);       
        $baby->title = $request['title'];
        $baby->title_about = $request['title_about'];
        $baby->childrencount_id = $request['childrencount_id'];
        $baby->workperiod_id = $request['workperiod_id'];
        $baby->employment_id = $request['employment_id'];
        $baby->drive = $request['drive'];
        $baby->agents = $request['agents'];
        $baby->hourpay_id = $request['hourpay_id'];
        $baby->monthpay_id = $request['monthpay_id'];
        $baby->save(); 

        return $baby;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client_baby::where('user_id', '=', $id)->delete();
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
