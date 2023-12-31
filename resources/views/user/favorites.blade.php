<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.userPage') }}</x-slot>

    @if($favoriteAnnouncements->isNotEmpty())
    
    <h2 class="text-center font-bold text-5xl mb-20">{{ __('ui.favoriteAnnouncements') }}</h2>

    <x-success />

    <div class="flex flex-wrap gap-10 mb-28">
        @foreach ($favoriteAnnouncements as $announcement)
        
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

    @else

    <div class="text-center">
        <p>{{ __('ui.noFavorites') }}</p>
    </div>

    @endif


</x-layout-main>
