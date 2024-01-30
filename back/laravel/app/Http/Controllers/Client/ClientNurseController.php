<?php

namespace App\Http\Controllers\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Client\ClientNurse;
use App\Http\Resources\Client\ClientNurseResource;
use App\Http\Requests\Client\NurseRequest;

class ClientNurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('client_nurses')) { Cache::put('client_nurses', ClientNurse::all()); }
        $Client_nurse = Cache::get('client_nurses');
        $client_nurse = null;
        foreach ($Client_nurse as $item) {
            if($item->user_id == $request["data"]) {
                $client_nurse = $item;
                break;
            }                           
        }

        if($client_nurse) { return new ClientNurseResource($client_nurse); }
        else { return 'null'; }
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
        $nurse = new ClientNurse([
            'user_id' => $request->user_id,
            'confirmed' => $request->confirmed,
            'title_about' => [
               'en' => $request->title_about['en'],
               'ua' => $request->title_about['ua']
            ],                        
            'workperiod_id' => $request->workperiod_id,
            'hourpay_id' => $request->hourpay_id,
            'monthpay_id' => $request->monthpay_id
        ]);                
        $nurse->save();

        Cache::put('client_nurses', ClientNurse::all());
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
        $nurse = ClientNurse::find($id);
        $nurse->title_about = [
               'en' => $request->title_about['en'],
               'ua' => $request->title_about['ua']
            ];        
        $nurse->workperiod_id = $request['workperiod_id'];
        $nurse->hourpay_id = $request['hourpay_id'];
        $nurse->monthpay_id = $request['monthpay_id'];
        $nurse->save(); 

        Cache::put('client_nurses', ClientNurse::all());
        return $nurse;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClientNurse::where('user_id', '=', $id)->delete();
        Cache::put('client_nurses', ClientNurse::all());
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
