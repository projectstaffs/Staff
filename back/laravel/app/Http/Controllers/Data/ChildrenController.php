<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\Children;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('childrens')) { Cache::put('childrens', Children::all()); }
        $getItems = Cache::get('childrens');
        return $getItems;
        //return Children::orderBy('created_at', 'desc')->get();
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
        $children = new Children([
            'title' => [
               'en' => $request->en,
               'ua' => $request->ua
            ],
        ]);
        $children->save();  
        
        Cache::put('childrens', Children::all());
        return response()->json('The children successfully added');
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
        $children = Children::find($id);
        $children->title = [
               'en' => $request->title['en'],
               'ua' => $request->title['ua']
            ];
        $children->save();

        Cache::put('childrens', Children::all());
        return response()->json(["The children successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $children = Children::find($id);
        $children->delete();        

        Cache::put('childrens', Children::all());
        return response()->json('The children successfully deleted');
    }
}
