<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddWatermarkImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $img = Image::find($this->announcement_image_id);
        if (!$img) {
            return;
        }

        $srcPath = storage_path('app/public/'.$img->path);

        $image = SpatieImage::load($srcPath);

        // Percorso dell'immagine del watermark
        $watermarkPath = base_path('public/img/presto-watermark.png');

        // Aggiunta del watermark
        $image->watermark($watermarkPath)
              ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT) // o Manipulations::POSITION_CENTER per centrare
              ->watermarkPadding(10, 10) // Padding, regolabile
              ->watermarkWidth(300, Manipulations::UNIT_PIXELS) // Larghezza del watermark, regolabile
              ->watermarkHeight(100, Manipulations::UNIT_PIXELS) // Altezza del watermark, regolabile
              ->watermarkFit(Manipulations::FIT_CONTAIN) // Fit del watermark
              ->watermarkOpacity(50); // Opacità del watermark (0-100), regolabile

        $image->save($srcPath);
    }
}
