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

class GoogleVisionSafeSearch implements ShouldQueue
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

        $image = file_get_contents(storage_path('app/public/'.$img->path));

        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelihoodName = [
            'text-gray-800 fas fa-circle', 'text-success-800 fas fa-circle', 'text-success-800 fas fa-circle', 'text-warning-800 fas fa-circle', 'text-warning-800 fas fa-circle', 'text-red-800 fas fa-circle', 
        ];

        $img->adult = $likelihoodName[$adult];
        $img->medical = $likelihoodName[$medical];
        $img->spoof = $likelihoodName[$spoof];
        $img->violence = $likelihoodName[$violence];
        $img->racy = $likelihoodName[$racy];

        $img->save();
    }
}
