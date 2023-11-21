<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;
use Imagine\Image\Box;
use Imagine\Imagick\Imagine;

class PreviewImgJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $path;
    protected $previewName;

    /**
     * Create a new job instance.
     */
    public function __construct($path, $previewName)
    {
        $this->path = $path;
        $this->previewName = $previewName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $imageContent = Storage::disk('minio')->get($this->path);
        
        $imagine = new Imagine();
        $image = $imagine->load($imageContent);
        $image->resize(new Box(100, 100));
        $updatedImageData = $image->get('jpg'); // Указываем формат 'jpeg', или другой подходящий формат

        Storage::disk('minio')->put($this->previewName, $updatedImageData);
    }
}
