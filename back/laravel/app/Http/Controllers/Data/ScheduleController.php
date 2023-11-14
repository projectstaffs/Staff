<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\data\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('schedules')) { Cache::put('schedules', Schedule::all()); }
        $getItems = Cache::get('schedules');
        return $getItems;
        //return Schedule::orderBy('created_at', 'desc')->get();
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
        $schedule = new Schedule([
            'title' => $request->title
        ]);
        $schedule->save();
        
        Cache::put('schedules', Schedule::all());
        return response()->json('The schedule successfully added');
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
        $schedule = Schedule::find($id);
        $schedule->title = $request['title'];
        $schedule->save();

        Cache::put('schedules', Schedule::all());
        return response()->json(["The schedule successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();        

        Cache::put('schedules', Schedule::all());
        return response()->json('The schedule successfully deleted');
    }
}
