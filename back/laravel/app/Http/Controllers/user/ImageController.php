<?php

namespace App\Http\Controllers\user;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\user\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use Imagine\Image\Box;
use Imagine\Imagick\Imagine;
use Aws\S3\S3Client;

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
                $previewName = 'prev_' . $name;
                $path = Storage::disk('minio')->putFileAs('/images', $image, $name);

                $s3Config = [
                    'region' => 'us-east-1', 
                    'version' => 'latest',
                    'credentials' => [
                        'key' => 'G3W2jWFTn7CfKWsXHEu8',
                        'secret' => 'SUhaDLsntGomofDtBwTDZGDjnoRLJUTcB4mlToxI',
                    ],
                    'endpoint' => 'http://storage.minio:9000', // Адрес сервера MinIO
                    'use_path_style_endpoint' => true,
                ];
        
                // Создаем клиент S3 (MinIO)
                $s3Client = new S3Client($s3Config);
        
                // Получаем загруженное изображение из запроса
                //$uploadedImage = $request->file('image');
        
                // Создаем экземпляр класса Imagine
                $imagine = new Imagine();
        
                // Открываем загруженное изображение
                $image2 = $imagine->open($image);
        
                // Изменяем размер изображения (например, до 800x600)
                $newSize = new Box(100, 100);
                $resizedImage = $image2->resize($newSize);
        
                // Получаем байтовые данные измененного изображения
                $imageData = $resizedImage->get('jpg', ['jpeg_quality' => 90]);
        
                // Имя вашего хранилища (бакета) в MinIO
                $bucketName = 'storage';
        
                // Путь и имя файла в хранилище MinIO
                $objectName = 'images/' . $previewName;
        
                // Загружаем байтовые данные в хранилище MinIO (S3)
                $result = $s3Client->putObject([
                    'Bucket' => $bucketName,
                    'Key' => $objectName,
                    'Body' => $imageData,
                    'ContentType' => 'image/jpeg',
                ]);
                
                //$imagine = new Imagine();
                //$imagine->open($image)->resize(new Box(50, 50))->save('http://storage.minio:9000/storage/images/' . $previewName);
                //$preview_path = Storage::disk('minio')->putFileAs('/images', $image, $previewName);
                $res = Image::create([
                    'user_id' => $request['user_id'],
                    'path' => $path,
                    'url' => url('http://localhost:9000/storage/' . $path),
                    'preview_path' => 'some',
                    'preview_url' => url('some')                    
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
            //Storage::disk('minio')->delete($image->preview_path);
        }
        Image::where('user_id', '=', $id)->delete();
        Cache::put('images', Image::all());
        return response()->json('Картинки успешно удалены.');
    }
}
