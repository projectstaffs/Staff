<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\BabysittingDutie;

class BabysittingDutieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('babysittingduties')) { Cache::put('babysittingduties', BabysittingDutie::all()); }
        $getItems = Cache::get('babysittingduties');
        return $getItems;
        //return BabysittingDutie::orderBy('created_at', 'desc')->get();
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
        $babysittingDutie = new BabysittingDutie([
            'title' => [
               'en' => $request->en,
               'ua' => $request->ua
            ],
        ]);
        $babysittingDutie->save();  
        
        Cache::get('babysittingduties');
        return response()->json('The babysittingDutie successfully added');
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
        $babysittingDutie = BabysittingDutie::find($id);
        $babysittingDutie->title = [
               'en' => $request->title['en'],
               'ua' => $request->title['ua']
            ];
        $babysittingDutie->save();

        Cache::get('babysittingduties');
        return response()->json(["The babysittingDutie successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $babysittingDutie = BabysittingDutie::find($id);
        $babysittingDutie->delete();        

        Cache::get('babysittingduties');
        return response()->json('The babysittingDutie successfully deleted');
    }
}
