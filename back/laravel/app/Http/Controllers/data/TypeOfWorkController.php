<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\TypeOfWork;

class TypeOfWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TypeOfWork::orderBy('created_at', 'desc')->get();
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
        $typeOfWork = new TypeOfWork([
            'title' => $request->title
        ]);
                
        $typeOfWork->save();        
        return response()->json('The typeOfWork successfully added');
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
        $typeOfWork = TypeOfWork::find($id);
        $typeOfWork->title = $request['title'];       

        $typeOfWork->save();
        return response()->json(["The typeOfWork successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeOfWork = TypeOfWork::find($id);
        $typeOfWork->delete();        

        return response()->json('The typeOfWork successfully deleted');
    }
}
