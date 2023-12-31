<?php

namespace App\Livewire;

use App\Jobs\AddWatermarkImage;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\Attributes\On;
use App\Models\Announcement;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class CreateAnnouncement extends Component
{
    use WithFileUploads;

    #[Rule('required', message: 'ui.isRequired')]
    #[Rule('min:4', message: 'ui.minLength')]
    #[Rule('max:150', message: 'ui.maxLength')]
    public $title;

    #[Rule('required', message: 'ui.isRequired')]
    public $category;

    #[Rule('required', message: 'ui.isRequired')]
    #[Rule('min:8', message: 'ui.minLength')]
    #[Rule('max:1000', message: 'ui.maxLength')]
    public $body;

    #[Rule('required', message: 'ui.isRequired')]
    #[Rule('numeric', message: 'ui.isNumeric')]
    #[Rule('max:99999999', message: 'ui.maxLength')]
    public $price;

    public $temporaryImages;
    public $images = [];
    public $selectedImage = null;

    protected $rules = [
        'images.*' => 'image|max:3072',
        'temporaryImages.*' => 'image|max:3072'
    ];

    protected $messages = [
        'temporaryImages.required' => 'ui.imgRequired',
        'temporaryImages.*.image' => 'ui.mustBeImg',
        'temporaryImages.*.max' => 'ui.max1MB',
        'images.image' => 'ui.mustBeImg',
        'images.max' => 'ui.max1MB',
    ];

    public function updatedTemporaryImages () {
        if ($this->validate([
            'temporaryImages.*' => 'image|max:3072',
        ])) {
            foreach ($this->temporaryImages as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage ($key) {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store() {
        $this->validate();

        // prelevamento record categoria
        $category = Category::find($this->category);

        // Verifica se l'utente è un admin
        $isRevised = Auth::user()->role == 'admin' ? true : null;

        $announcement = $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'revised' => $isRevised,
        ]);
        Auth::user()->announcements()->save($announcement);
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $newFileName = "announcements/{$announcement->id}";
                $newImage = $announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    new ResizeImage($newImage->path, 500, 500),
                    new AddWatermarkImage($newImage->id)
                ])->dispatch($newImage->id);

            // ResizeImage::withChain([new AddWatermarkImage($newImage->id)]);
            }

        File::deleteDirectory(storage_path('app/livewire-tmp'));
        }

        session()->flash('success', __('ui.successCreateAnnouncement'));
        $this->cleanForm();
    }


    // Svuota campi annuncio
    public function cleanForm() {
        $this->title = '';
        $this->category = '';
        $this->images = [];
        $this->temporaryImages = [];
        $this->body = '';
        $this->price = '';
    }

    public function render() {
        return view('livewire.create-announcement');
    }
}
