<?php

namespace App\Http\Controllers\Forms;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Forms\Credential;
use App\Http\Requests\Worker\CredentialRequest;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Cache::has('credentials')) { Cache::put('credentials', Credential::all()); }
        $Credentials = Cache::get('credentials');
        $credentials = array();
        foreach ($Credentials as $item) {
            if($item->user_id == $request["data"]) {
                array_push($credentials, $item);
            }                           
        }

        if($credentials) { return $credentials; }
        else { return null; }
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
    public function store(CredentialRequest $request)
    {
        $credential = new Credential([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
            'user_id' => $request->user_id,
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
        $credential->full_name = $request['full_name'];
        $credential->phone = $request['phone'];
        $credential->email = $request['email'];
        $credential->content = $request['content'];
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
