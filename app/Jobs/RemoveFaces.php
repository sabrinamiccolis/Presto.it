<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;

class RemoveFaces implements ShouldQueue
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
        $image = file_get_contents($srcPath);


        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credential.json'));


        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();

            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }

            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][1] - $bounds[0][1];

            $image = SpatieImage::load($srcPath);

            /* inserire il percorso e l'immagine da usare come watermark */
            $image->watermark(base_path('public/img/blur.png'))
                ->watermarkPosition('top-left')
                ->watermarkPadding($bounds[0][0], $bounds[0][1])
                ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
                ->watermarkHeight($h, Manipulations::UNIT_PIXELS)
                ->watermarkFit(Manipulations::FIT_STRETCH);

            $image->save($srcPath);
        }

        $imageAnnotator->close();
    }
}
