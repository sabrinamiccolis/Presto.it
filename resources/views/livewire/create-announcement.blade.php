<div>
    <x-slot:title>{{ $title ?? __('ui.createAnnouncement') }}</x-slot>

    <h2 class="mb-10 text-5xl font-bold text-center">{{ __('ui.createAnnouncement') }}</h2>

    <x-success />

    <div class="flex flex-wrap">
        <div class="w-full @if ($images)lg:w-1/2 lg:order-2 @endif">
            <form wire:submit.prevent="store" class="form max-w-xl mx-auto">
                @csrf

                <!-- Title input -->
                @error('title') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                <div class="relative mb-6">
                    <label for="title" class="label-form">{{ __('ui.announcementTitle') . (':') }}</label>
                    <input wire:model.live="title" type="text" class="input-form @error('title') border-danger @enderror" id="title" placeholder="{{ __('ui.announcementTitle') }}" value="{{ old('title') }}" required maxlength="150"/>
                </div>

                <!-- Select input -->
                @error('category') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                <div class="relative mb-6">
                    <label for="category" class="label-form"  data-te-select-label-ref>{{ __('ui.category') . (':') }}</label>
                    <select wire:model.defer="category" class="input-form @error('category') border-danger @enderror" id="category" required>
                        <option value="" selected class="text-gray-600 placeholder:text-gray-400">{{ __('ui.chooseCategory') . ('...') }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- temporaryImages input -->
                @error('temporaryImages.*') <span class="text-danger-600 text-sm">{{ __($message) }}</span> @enderror
                <div class="relative mb-6">
                    <label for="temporaryImages" class="label-form">{{ __('ui.images') . (':') }}</label>
                    <input wire:model="temporaryImages" type="file" class="input-form bg-white @error ('temporaryImages.*') border-danger @enderror" id="temporaryImages" placeholder="{{ __('ui.selectImages') }}" value="{{ __('ui.selectIimages') }}" name="images" multiple/>
                </div>
                
                <!-- Description input -->
                @error('body') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                <div class="relative mb-6">
                    <label for="body" class="label-form">{{ __('ui.description') . (':') }}</label>
                    <textarea wire:model.live="body" class="input-form @error('body') border-danger @enderror" type="text" id="body" placeholder="{{ __('ui.description') }}" value="{{ old('body') }}" required maxlength="1000"></textarea>
                </div>
                
                <!-- Price input -->
                @error('price') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                <div class="relative mb-6">
                    <label for="price" class="label-form">{{ __('ui.price') . (':') }}</label>
                    <input wire:model.live="price" type="number" step=".01" class="input-form @error('price') border-danger @enderror" id="price" placeholder="{{ __('ui.price') }}" value="{{ old('price') }}" required maxlength="8"  pattern="^\d+(\.\d+)?(,\d+)?$"/>
                </div>
                
                <div class="text-center my-10">
                    <button type="submit" class="btn">{{ __('ui.createAnnouncement') }}</button>
                </div>
            </form>
        </div>

        @if ($images)
        <div class="w-full lg:w-1/2 lg:order-1">
            <div class="flex">
                <!-- Colonna delle anteprime -->
                <div class="w-1/5 space-y-2">
                    @foreach ($images as $key => $image)
                        <div class="overflow-hidden rounded-lg">
                            <button wire:click="$set('selectedImage', {{ $key }})" class="focus:outline-none">
                                <img src="{{ $image->temporaryUrl() }}" class="w-full h-24 object-cover opacity-75 hover:opacity-100">
                            </button>
                        </div>
                    @endforeach
                </div>
            
                <!-- Colonna dell'immagine selezionata -->
                <div class="w-3/5 ml-10">
                    @if ($selectedImage !== null && array_key_exists($selectedImage, $images))
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="{{ $images[$selectedImage]->temporaryUrl() }}" class="w-full h-96 object-cover">
                            <button wire:click="removeImage({{ $selectedImage }})" class="absolute top-0 right-0 bg-red-600 text-white p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
    
</div>
