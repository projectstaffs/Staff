<?php

namespace App\Http\Controllers\message;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\message\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {          
        $messages = Message::where('sender', $request["data"])->get();          
        return $messages;        
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
        $message = new Message([
            'sender' => $request->sender,
            'recipient' => $request->recipient,            
            'name' => $request->name,
            'surname' => $request->surname,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'title' => $request->title,
            'content' => $request->content,
            'time' => $request->time,
            'reading' => $request->reading                        
        ]);                
        $message->save();                
        return $message;
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
        $message = Message::find($id);
        //$desk->update($request->all());
        $message->reading = $request->input('reading');

        $message->save();

        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
