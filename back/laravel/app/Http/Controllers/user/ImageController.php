<?php

namespace App\Http\Controllers\user;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\user\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $res = null;
        if($request['images']) {            
            foreach ($request['images'] as $image) {
                $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);
                $previewName = 'prev_' . $name;                

                $res = Image::create([
                    'path' => $filePath,
                    'url' => url('/storage/' . $filePath),                                        
                    'user_id' => $request['user_id'],
                    'preview_url' => url('/storage/images/' . $previewName)                    
                ]);
                \Intervention\Image\Facades\Image::make($image)->fit(100, 100)->save(storage_path('app/public/images/' . $previewName));                
            }
        }       

        return $res;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $images = Image::where('user_id', '=', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->path);
            $str2=strpos($image->preview_url, "images"); $row2=substr($image->preview_url, $str2);
            Storage::disk('public')->delete($row2);
        }
        Image::where('user_id', '=', $id)->delete();
        return response()->json('Картинки успешно удалены.');
    }
}
