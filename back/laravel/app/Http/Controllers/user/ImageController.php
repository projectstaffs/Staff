<?php

namespace App\Http\Controllers\user;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
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
                $path = Storage::disk('minio')->putFileAs('/images', $image, $name);
                //$previewName = 'prev_' . $name;
                $res = Image::create([
                    'path' => $path,
                    'url' => url('http://localhost:9000/storage/' . $path),                                        
                    'user_id' => $request['user_id'],
                    'preview_url' => 'some'                    
                ]);
                //\Intervention\Image\Facades\Image::make($image)->fit(100, 100)->save(storage_path('app/public/images/' . $previewName));  
                
            }
            Cache::put('images', Image::all());
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
            Storage::disk('minio')->delete($image->path);
            //Storage::disk('public')->delete($image->path);
            //$str2=strpos($image->preview_url, "images"); $row2=substr($image->preview_url, $str2);
            //Storage::disk('public')->delete($row2);
        }
        Image::where('user_id', '=', $id)->delete();
        Cache::put('images', Image::all());
        return response()->json('Картинки успешно удалены.');
    }
}
