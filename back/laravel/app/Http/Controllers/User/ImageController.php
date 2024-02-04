<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\User\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Jobs\PreviewImgJob;

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
        $appUrl = env('APP_URL');
        $res = null;
        if($request['images']) {            
            foreach ($request['images'] as $image) {
                $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();                
                $previewName = '/images/prev_' . $name;
                $path = Storage::disk('minio')->putFileAs('/images', $image, $name);
                PreviewImgJob::dispatch($path, $previewName);

                $res = Image::create([
                    'user_id' => $request['user_id'],
                    'path' => $path,
                    'url' => url($appUrl . '/storage/' . $path),
                    'preview_path' => $previewName,
                    'preview_url' => url($appUrl . '/storage/' . $previewName)                    
                ]);                
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
            Storage::disk('minio')->delete($image->preview_path);
        }
        Image::where('user_id', '=', $id)->delete();
        Cache::put('images', Image::all());
        return response()->json('Картинки успешно удалены.');
    }
}
