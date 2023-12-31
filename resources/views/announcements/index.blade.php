<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.allAnnouncements') }}</x-slot>



    <h2 class="text-center font-bold text-4xl my-10">{{ __('ui.allAnnouncements') }}</h2>

    <x-success />

    <div class="flex flex-wrap gap-10">
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
    
    <div class="my-5">

        {{ $announcements->links() }}
        
    </div>




</x-layout-main>