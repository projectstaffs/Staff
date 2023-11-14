<?php

namespace App\Http\Controllers\message;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\message\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('reviews')) { Cache::put('reviews', Review::all()); }
        $getItems = Cache::get('reviews');
        return $getItems;
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
    public function store(ReviewRequest $request)
    {
        $review = new Review([
            'name' => $request->name,
            'surname' => $request->surname,
            'city' => $request->city,
            'content' => $request->content
        ]);        
        $review->save(); 
        
        Cache::put('reviews', Review::all());
        return response()->json('The review successfully added');
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
    public function update(ReviewRequest $request, string $id)
    {
        $review = Review::find($id);
        $review->name = $request['name'];
        $review->surname = $request['surname'];
        $review->city = $request['city'];
        $review->content = $request['content'];
        $review->save();

        Cache::put('reviews', Review::all());
        return response()->json(["The review successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        $review->delete();        

        Cache::put('reviews', Review::all());
        return response()->json('The review successfully deleted');
    }
}
