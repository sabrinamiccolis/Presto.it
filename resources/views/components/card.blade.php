<div class="w-full md:w-1/4 mx-auto relative">
    <div class="shadow-xl shadow-[#1f2426] rounded-xl bg-black text-white p-4 relative">
        <div class="absolute top-7 left-0 text-center">
            <a class="bg-greenDark px-4 bg-greenLight rounded-e-full text-black text-sm p-1" href="{{ $routeCategory }}">{{ __('ui.' .$nameCategory) }}</a>
        </div>
        <img class="rounded-xl p-1 mx-auto" src="{{ $image }}" alt="">
        <div class="p-3">
            <h5 class="truncate font-bold text-xl text-center mb-2">{{ $title }}</h5>
            <p class="line-clamp-1 text-sm">{{ $body }}</p>

            <p class="mb-2 mt-3">{{ euro($price) }}</p>
            <a href="{{ $routeAnnouncement }}" class="btn w-full text-center">{{ __('ui.view') }}</a>
            <p class="text-xs text-gray-500 text-center mt-2">{{ __('ui.createdOn') }} {{ $createdAt }}</p>
        </div>
    </div>

    @auth
        

    <div class="absolute top-[10px] right-[10px] z-30">
        <form action="{{ route('favorites.store', $announcement->id) }}" method="POST">
            @csrf
            <button type="submit" class="heart-button text-3xl">
                @if(auth()->user()->hasFavorited($announcement))
                <i class="fa-solid fa-heart text-red-700 bg-[#9fe93f] rounded-full p-1.5"></i>
                @else
                <i class="fa-solid fa-heart text-[#1f2426] bg-[#9fe93f] rounded-full p-1.5 hover:text-red-700"></i>
                @endif
            </button>
        </form>
    </div>

    @endauth
</div>
