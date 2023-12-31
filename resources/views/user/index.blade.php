<x-layout-main>
    
    <x-slot:title>{{ $title ?? __('ui.userPage') }}</x-slot>
    
    @if($announcements->isNotEmpty())
    <h2 class="text-center font-bold text-5xl mb-20">{{ __('ui.yourAnnouncements') . ':' }}</h2>
    
    <x-success />
    
    <div class="flex flex-wrap gap-10 mb-28">
        @foreach ($announcements as $announcement)
        
        <x-user-card :routeCategory="route('showCategory', ['category' => $announcement->category])"
            :nameCategory="$announcement->category->name"
            :announcementId="$announcement->id"
            :title="$announcement->title"
            :image="!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/400'"
            :body="$announcement->body"
            :price="$announcement->price"
            :routeAnnouncement="route('announcements.show', compact('announcement'))"
            :createdAt="$announcement->created_at->format('d/m/Y')"
            :announcement="$announcement"/>
            
            
            
            @endforeach
        </div>
        @else
        
        <div class="text-center">
            <p>{{ __('ui.noAnnouncementsCreated') }}</p>
            <a href="{{ route('announcements.create') }}" class="btn">{{ __('ui.createAnnouncement') }}</a>
        </div>
        
        @endif
        
        <!-- Modale Eliminazione Annuncio -->
        <div id="announcementDeletionModal" class="z-50 hidden fixed inset-0 bg-gray-600 bg-opacity-50 bg-op overflow-y-auto h-full w-full">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('ui.deleteAnnouncement') }}</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">{{ __('ui.deleteAnnouncementConfirm') }}</p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button id="cancelAnnouncementDeletion" class="px-4 py-2 bg-gray-200 text-gray-900 rounded hover:bg-gray-300">{{ __('ui.cancel') }}</button>
                        <button id="confirmAnnouncementDeletion" class="ml-3 px-4 py-2 bg-danger-500 text-white rounded hover:bg-danger-700">{{ __('ui.confirm') }}</button>
                    </div>
                </div>
            </div>
        </div>
        
        
    </x-layout-main>
    