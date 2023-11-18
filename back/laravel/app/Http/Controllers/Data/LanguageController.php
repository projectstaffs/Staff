<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('languages')) { Cache::put('languages', Language::all()); }
        $getItems = Cache::get('languages');
        return $getItems;
        //return Language::orderBy('created_at', 'desc')->get();
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
        $language = new Language([
            'title' => $request->title
        ]);
        $language->save(); 
        
        Cache::put('languages', Language::all());
        return response()->json('The language successfully added');
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
        $language = Language::find($id);
        $language->title = $request['title'];
        $language->save();

        Cache::put('languages', Language::all());
        return response()->json(["The language successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $language = Language::find($id);
        $language->delete();        

        Cache::put('languages', Language::all());
        return response()->json('The language successfully deleted');
    }
}
