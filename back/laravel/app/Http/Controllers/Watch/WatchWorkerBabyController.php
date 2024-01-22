<?php

namespace App\Http\Controllers\Watch;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Watch\WatchWorkerBaby;

class WatchWorkerBabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('watchworkerbabies')) { Cache::put('watchworkerbabies', WatchWorkerBaby::all()); }
        $getItems = Cache::get('watchworkerbabies');
        $myWatch = array();
        foreach ($getItems as $item) {
            if($item->user_id == $request["data"]) {
                array_push($myWatch, $item);
            }                          
        }
        
        return $myWatch;
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
        if(!Cache::has('watchworkerbabies')) { Cache::put('watchworkerbabies', WatchWorkerBaby::all()); }
        $getItems = Cache::get('watchworkerbabies');        
        $myWatch = array();
        foreach ($getItems as $item) {
            if(($item->user_id == $request["user_id"]) && ($item->anketa_id == $request["anketa_id"])) {
                return 'Уже есть такая анкета.';
            }
            if($item->user_id == $request["user_id"]) {
                array_push($myWatch, $item);
            }                          
        }
        $count = count($myWatch);
        if($count == 10) {
            $elem = WatchWorkerBaby::find($myWatch[0]->id);
            $elem->delete();
        }

        $watchWorkerBaby = new WatchWorkerBaby([
            'user_id' => $request["user_id"],
            'anketa_id' => $request["anketa_id"]
        ]);                    
        $watchWorkerBaby->save();

        Cache::put('watchworkerbabies', WatchWorkerBaby::all());
        return 'Анкета добавлена в просмотренные.';
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
        //
    }
}
