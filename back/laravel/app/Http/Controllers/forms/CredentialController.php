<?php

namespace App\Http\Controllers\forms;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\forms\Credential;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $credentials = Credential::where('user_id', $request["data"])->get();          
        return $credentials; 
        //return Credential::orderBy('created_at', 'desc')->get();
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
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);
                
        $credential->save();        
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
    public function update(Request $request, string $id)
    {
        $credential = Credential::find($id);
        $credential->full_name = $request['full_name'];
        $credential->phone = $request['phone'];
        $credential->email = $request['email'];
        $credential->content = $request['content'];       

        $credential->save();
        return response()->json(["The credential successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $credential = Credential::find($id);
        $credential->delete();        

        return response()->json('The credential successfully deleted');
    }
}
