<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.home') }}</x-slot>

    <h2 class="mb-20 text-5xl font-bold text-center">{{ __('ui.homeTitle') }}</h2>

    <x-success />


                <div class="flex flex-wrap mb-20 mx-auto justify-center items-center">


                    <div class="px-8 mb-5 sm:w-1/2 w-full text-md text-justify">
                        <p class="lg:mx-24 text-xl">{{ __('ui.homeDescription1') }}
                        </p>
                        <p class="lg:mx-24 text-xl mt-5">{{ __('ui.homeDescription2') }}
                        </p>
                        <p class="lg:mx-24 text-xl mt">{{ __('ui.homeDescription3') }}
                        </p>
                    </div>
                    
                    <div class="px-8 sm:w-1/2 w-full">
                        <img class="md:w-5/6  mx-auto rounded shadow-lg shadow-[#1f2426]" src="https://picsum.photos/1000/1000" alt="">
                    </div>
                </div>

                <h2 class="mb-4 text-5xl font-bold text-center">{{ __('ui.homeSearch') }}</h2>

                    <div class="sm:mx-10 text-md text-center">
                        <p class="ms-4 text-xl my-20">{{ __('ui.homeDescription4') }}</p>
                    </div>
                    
                </div>

    <a href="{{ route("announcements.index") }}"><h2 class="text-center font-bold text-5xl mb-20">{{ __('ui.latestAnnouncements') . ':' }}</h2></a>

    

    
        
    <div class="flex flex-wrap gap-10 mb-28">
        @foreach ($announcements as $announcement)
        
        <x-card :routeCategory="route('showCategory', ['category' => $announcement->category])"
            :announcement="$announcement"
            :nameCategory="$announcement->category->name"
            :title="$announcement->title"
            :image="!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/400'"
            :body="$announcement->body"
            :price="$announcement->price"
            :routeAnnouncement="route('announcements.show', compact('announcement'))"
            :createdAt="$announcement->created_at->format('d/m/Y')" />
            
        @endforeach
    </div>
        
</x-layout-main>
