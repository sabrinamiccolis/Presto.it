<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.editAnnouncement') }}</x-slot>
        
    <h2 class="text-center font-semibold text-4xl uppercase mb-20">{{ __('ui.editAnnouncement') }}</h2>
        
    <x-success /> 


    <div class="max-w-4xl mx-auto">
        <form action="{{ route('announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data" class="form p-6">
            @csrf
            @method('PUT')

            <!-- Title input -->
            <div class="mb-4">
                @error('title')<span class="text-red-500 text-xs italic">{{ $message }}</span>@enderror
                <label for="title" class="label-form">{{ __('ui.announcementTitle') . (':') }}</label>
                <input type="text" name="title" id="title" class="input-form @error('title') border-danger @enderror" value="{{ $announcement->title }}" required>
            </div>

            <!-- Category Select -->
            <!-- Assicurarsi di avere la lista delle categorie disponibile nella vista -->
            <div class="mb-4">
                @error('category')<span class="text-red-500 text-xs italic">{{ $message }}</span>@enderror
                <label for="category" class="label-form">{{ __('ui.category') . (':') }}</label>
                <select name="category" id="category" class="input-form @error('category') border-danger @enderror" required>
                    <option value="">{{ __('ui.chooseCategory') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $announcement->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description input -->
            <div class="mb-4">
                @error('body')<span class="text-red-500 text-xs italic">{{ $message }}</span>@enderror
                <label for="body" class="label-form">{{ __('ui.description') . (':') }}</label>
                <textarea name="body" id="body" rows="4" class="input-form @error('body') border-danger @enderror" required>{{ $announcement->body }}</textarea>
            </div>

            <!-- Price input -->
            <div class="mb-4">
                @error('price')<span class="text-red-500 text-xs italic">{{ $message }}</span>@enderror
                <label for="price" class="label-form">{{ __('ui.price') . (':') }}</label>
                <input type="number" name="price" id="price" class="input-form @error('price') border-danger @enderror" value="{{ $announcement->price }}" required>
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                @error('images')<span class="text-red-500 text-xs italic">{{ $message }}</span>@enderror
                <label for="images" class="label-form">{{ __('ui.images') . (':') }}</label>
                <input type="file" name="images[]" id="images" class="input-form bg-white @error('images') border-danger @enderror" multiple>
                <!-- Visualizzazione delle immagini esistenti -->
                
            </div>

            <!-- Submit button -->
            <div class="flex items-center justify-between">
                <button class="btn" type="submit">
                    {{ __('ui.saveChanges') }}
                </button>
            </div>
        </form>

        @if ($announcement->images)
            
        
        <div class="mt-4">
            @foreach ($announcement->images as $image)
                <div class="inline-block relative">
                    <img src="{{ Storage::url($image->path) }}" alt="Immagine" class="w-32 h-32 object-cover">
                    <form action="{{ route('announcements.delete_image', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="absolute top-0 right-0 bg-red-600 text-white p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        @endif
    </div>


</x-layout-main>