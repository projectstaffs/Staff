<?php

namespace App\Http\Controllers\watch;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\watch\WatchWorkerKeeper;

class WatchWorkerKeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('watchworkerkeepers')) { Cache::put('watchworkerkeepers', WatchWorkerKeeper::all()); }
        $getItems = Cache::get('watchworkerkeepers');
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
        if(!Cache::has('watchworkerkeepers')) { Cache::put('watchworkerkeepers', WatchWorkerKeeper::all()); }
        $getItems = Cache::get('watchworkerkeepers');        
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
        if($count == 4) {
            $elem = WatchWorkerKeeper::find($myWatch[0]->id);
            $elem->delete();
        }

        $watchWorkerKeeper = new WatchWorkerKeeper([
            'user_id' => $request["user_id"],
            'anketa_id' => $request["anketa_id"]
        ]);                    
        $watchWorkerKeeper->save();

        Cache::put('watchworkerkeepers', WatchWorkerKeeper::all());
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
