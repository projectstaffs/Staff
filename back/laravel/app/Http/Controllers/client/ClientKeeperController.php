<?php

namespace App\Http\Controllers\client;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\client\Client_keeper;
use App\Http\Resources\ClientKeeperResource;

class ClientKeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keeper = Client_keeper::where('user_id', $request["data"])->first();
        if($keeper) { return new ClientKeeperResource($keeper); }
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
        $keeper = new Client_keeper([
            'user_id' => $request->user_id,
            'confirmed' => $request->confirmed,
            'title' => $request->title,
            'title_about' => $request->title_about,                        
            'workperiod_id' => $request->workperiod_id,
            'employment_id' => $request->employment_id,
            'drive' => $request->drive,
            'agents' => $request->agents,
            'hourpay_id' => $request->hourpay_id,
            'monthpay_id' => $request->monthpay_id
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
        $keeper = Client_keeper::find($id);       
        $keeper->title = $request['title'];
        $keeper->title_about = $request['title_about'];        
        $keeper->workperiod_id = $request['workperiod_id'];
        $keeper->employment_id = $request['employment_id'];
        $keeper->drive = $request['drive'];
        $keeper->agents = $request['agents'];
        $keeper->hourpay_id = $request['hourpay_id'];
        $keeper->monthpay_id = $request['monthpay_id'];
        $keeper->save(); 

        return $keeper;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client_keeper::where('user_id', '=', $id)->delete();
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
