<?php

namespace App\Http\Controllers\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Client\ClientKeeper;
use App\Http\Resources\Client\ClientKeeperResource;
use App\Http\Requests\Client\KeeperRequest;

class ClientKeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('client_keepers')) { Cache::put('client_keepers', ClientKeeper::all()); }
        $Client_keeper = Cache::get('client_keepers');
        $client_keeper = null;
        foreach ($Client_keeper as $item) {
            if($item->user_id == $request["data"]) {
                $client_keeper = $item;
                break;
            }                           
        }

        //$keeper = Client_keeper::where('user_id', $request["data"])->first();
        if($client_keeper) { return new ClientKeeperResource($client_keeper); }
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
    public function store(KeeperRequest $request)
    {
        $keeper = new ClientKeeper([
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

        Cache::put('client_keepers', ClientKeeper::all());
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
    public function update(KeeperRequest $request, string $id)
    {
        $keeper = ClientKeeper::find($id);       
        $keeper->title = $request['title'];
        $keeper->title_about = $request['title_about'];        
        $keeper->workperiod_id = $request['workperiod_id'];
        $keeper->employment_id = $request['employment_id'];
        $keeper->drive = $request['drive'];
        $keeper->agents = $request['agents'];
        $keeper->hourpay_id = $request['hourpay_id'];
        $keeper->monthpay_id = $request['monthpay_id'];
        $keeper->save(); 

        Cache::put('client_keepers', ClientKeeper::all());
        return $keeper;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClientKeeper::where('user_id', '=', $id)->delete();
        Cache::put('client_keepers', ClientKeeper::all());
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
