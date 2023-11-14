<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\data\HousekeeperTypeOfWork;

class HousekeeperTypeOfWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('housekeepertypeofworks')) { Cache::put('housekeepertypeofworks', HousekeeperTypeOfWork::all()); }
        $getItems = Cache::get('housekeepertypeofworks');
        return $getItems;
        //return HousekeeperTypeOfWork::orderBy('created_at', 'desc')->get();
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
        $housekeeperTypeOfWork = new HousekeeperTypeOfWork([
            'title' => $request->title
        ]);
        $housekeeperTypeOfWork->save(); 
        
        Cache::put('housekeepertypeofworks', HousekeeperTypeOfWork::all());
        return response()->json('The housekeeperTypeOfWork successfully added');
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
        $housekeeperTypeOfWork = HousekeeperTypeOfWork::find($id);
        $housekeeperTypeOfWork->title = $request['title'];
        $housekeeperTypeOfWork->save();
        
        Cache::put('housekeepertypeofworks', HousekeeperTypeOfWork::all());
        return response()->json(["The housekeeperTypeOfWork successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $housekeeperTypeOfWork = HousekeeperTypeOfWork::find($id);
        $housekeeperTypeOfWork->delete();        

        Cache::put('housekeepertypeofworks', HousekeeperTypeOfWork::all());
        return response()->json('The housekeeperTypeOfWork successfully deleted');
    }
}
