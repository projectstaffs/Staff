<?php

namespace App\Http\Controllers\Forms;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Forms\Credential;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('credentials')) { Cache::put('credentials', Credential::all()); }
        $Credentials = Cache::get('credentials');
        return $Credentials;
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
        $credential = new Credential([
            'title' => $request->title,
            'icon' => $request->icon,
        ]);                
        $credential->save(); 
        
        Cache::put('credentials', Credential::all());
        return response()->json('The credential successfully added');
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
    public function update(CredentialRequest $request, string $id)
    {
        $credential = Credential::find($id);
        $credential->title = $request['title'];
        $credential->icon = $request['icon'];
        $credential->save();

        Cache::put('credentials', Credential::all());
        return response()->json(["The credential successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $credential = Credential::find($id);
        $credential->delete();        

        Cache::put('credentials', Credential::all());
        return response()->json('The credential successfully deleted');
    }
}
