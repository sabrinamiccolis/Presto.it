<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.searchAnnouncements') }}</x-slot>



    <h2 class="text-center font-bold text-5xl my-10"> {{ __('ui.searchAnnouncements') }}</h2>

    <div class="flex flex-wrap gap-10">
        @forelse ($announcements as $announcement)

        <x-card :routeCategory="route('showCategory', ['category' => $announcement->category])"
            :announcement="$announcement"
            :nameCategory="$announcement->category->name"
            :title="$announcement->title"
            :image="!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/400'"
            :body="$announcement->body"
            :price="$announcement->price"
            :routeAnnouncement="route('announcements.show', compact('announcement'))"
            :createdAt="$announcement->created_at->format('d/m/Y')" />

        @empty

        <h2 class="font-bold text-3xl mx-auto text-center my-20">{{ __('ui.announcementNotFound') }}</h2>


        @endforelse
    </div>
    
    <div class="my-5">

        {{ $announcements->appends(["searched"=>$query])->links() }}
        
    </div>




</x-layout-main>