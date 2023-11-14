<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\data\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('statuses')) { Cache::put('statuses', Status::all()); }
        $getItems = Cache::get('statuses');
        return $getItems;
        //return Status::orderBy('created_at', 'desc')->get();
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
        $status = new Status([
            'title' => $request->title
        ]);
        $status->save();
        
        Cache::put('statuses', Status::all());
        return response()->json('The status successfully added');
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
        $status = Status::find($id);
        $status->title = $request['title'];
        $status->save();

        Cache::put('statuses', Status::all());
        return response()->json(["The status successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Status::find($id);
        $status->delete();        

        Cache::put('statuses', Status::all());
        return response()->json('The status successfully deleted');
    }
}
