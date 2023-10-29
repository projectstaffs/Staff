<?php

namespace App\Http\Controllers\Client;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Client\ClientBaby;
use App\Http\Resources\Client\ClientBabyResource;
use App\Http\Requests\Client\BabyRequest;

class ClientBabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('client_babies')) { Cache::put('client_babies', ClientBaby::all()); }
        $Client_baby = Cache::get('client_babies');
        $client_baby = null;
        foreach ($Client_baby as $item) {
            if($item->user_id == $request["data"]) {
                $client_baby = $item;
                break;
            }                           
        }

        if($client_baby) { return new ClientBabyResource($client_baby); }
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
         $baby = new ClientBaby([
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

        Cache::put('client_babies', ClientBaby::all());
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
        $baby = ClientBaby::find($id);       
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

        Cache::put('client_babies', ClientBaby::all());
        return $baby;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClientBaby::where('user_id', '=', $id)->delete();
        Cache::put('client_babies', ClientBaby::all());
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
