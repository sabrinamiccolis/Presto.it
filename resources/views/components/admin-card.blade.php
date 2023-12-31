<div class="w-full md:w-1/4 mx-auto relative">
    <div class="shadow-xl shadow-[#1f2426] rounded-xl bg-black text-white p-4 relative">
        <div class="absolute top-7 left-0 text-center">
            <a class="bg-greenDark px-4 bg-greenLight rounded-e-full text-black text-sm p-1" href="{{ $routeCategory }}">{{ __('ui.' .$nameCategory) }} </a>
        </div>
        <img class="rounded-xl p-1 mx-auto" src="{{ $image }}" alt="">
        <div class="p-3">
            <h5 class="truncate font-bold text-xl text-center mb-2">{{ $title }}</h5>
            <p class="line-clamp-1 text-sm">{{ $body }}</p>
            
            <p class="mb-2 mt-3">{{ euro($price) }}</p>
            <a href="{{ $routeAnnouncement }}" class="btn w-full text-center">{{ __('ui.view')}}</a>
            <p class="text-xs text-gray-500 text-center mt-2">{{ __('ui.createdOn')}} {{ $createdAt }}</p>
        </div>
        
        <form action="{{ route('announcements.destroy', $announcementId) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="announcementDeletionTrigger bg-danger-400 border-2 border-danger-600 rounded-full px-1 py-1 hover:bg-danger-600 hover:border-danger-800 hover:text-white absolute top-[-10px] right-[-10px]">
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6L6 18"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
            </button>  
            
        </form>
    
        @if ($announcement['revised']!=true)
        <div class="absolute top-[-10px] right-[64px] z-30 bg-yellow-400 rounded-full p-2">  
            <p class=" text-black uppercase font-bold">{{ __('ui.underRevision') }}</p>   
        </div> 
        @endif
    </div>
    
    
</div>