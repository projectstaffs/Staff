<?php

namespace App\Http\Controllers\Forms;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Forms\Keeper;
use App\Http\Resources\Forms\Keeper\KeeperResource;
use App\Http\Requests\Worker\KeeperRequest;

class KeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('keepers')) { Cache::put('keepers', Keeper::all()); }
        $Keeper = Cache::get('keepers');
        $keeper = null;
        foreach ($Keeper as $item) {
            if($item->user_id == $request["data"]) {
                $keeper = $item;
                break;
            }                           
        }
        //$keeper = Keeper::where('user_id', $request["data"])->first();
        if($keeper) { return new KeeperResource($keeper); }
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
    public function store(KeeperRequest $request)
    {
        $keeper = new Keeper([
            'user_id' => $request->user_id,
            'keeper_exp' => [
               'en' => $request->keeper_exp['en'],
               'ua' => $request->keeper_exp['ua']
            ],
            'experience_id' => $request->experience_id,            
            'workperiod_id' => $request->workperiod_id,            
            'hourpay_id' => $request->hourpay_id,
            'monthpay_id' => $request->monthpay_id,
            'confirmed' => $request->confirmed,
        ]);                
        $keeper->save();

        Cache::put('keepers', Keeper::all());
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
        $keeper = Keeper::find($id);       
        $keeper->keeper_exp = [
               'en' => $request->keeper_exp['en'],
               'ua' => $request->keeper_exp['ua']
            ];
        $keeper->experience_id = $request['experience_id'];        
        $keeper->workperiod_id = $request['workperiod_id'];        
        $keeper->hourpay_id = $request['hourpay_id'];
        $keeper->monthpay_id = $request['monthpay_id'];
        $keeper->save(); 

        Cache::put('keepers', Keeper::all());
        return $keeper;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Keeper::where('user_id', '=', $id)->delete();
        Cache::put('keepers', Keeper::all());
        return response()->json('Удаление анкеты прошло успешно.');
    }
}
