<x-layout-main>
    
    <x-slot:title>{{ $title ?? __('ui.announcementsToRevise') }}</x-slot>

    <section class="">

        <h2 class="mb-3 text-5xl font-bold text-center">{{ __('ui.announcementsToRevise') }}</h2>

        <x-success />

        @if ($announcements_toRevise->count() > 0)
        {{-- carousel --}}
        <div id="carouselExampleControlsTest" class="relative" data-te-carousel-init data-te-carousel-slide>
            <!--Carousel items-->
            <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">

                @foreach ($announcements_toRevise as $announcement)

                    <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none @if (!$loop->first) hidden @endif" data-te-carousel-item @if ($loop->first) data-te-carousel-active @endif>
                        
                        <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-16">
                            <div class="container mx-auto px-5">
                                <h2 class="text-center font-bold text-4xl bg-black rounded-3xl text-[#9fe93f] py-1 uppercase">{{ $announcement->title }}</h2>
                                <div class="text-center my-5">
                                    <a class="uppercase hover:bg-[#9fe93f] hover:p-2 hover:rounded-lg font-bold" href="{{ route('showCategory', ['category' => $announcement->category]) }}">{{ __('ui.' .$announcement->category->name) }}</a>
                                </div>
                            </div>
                            
                            <div class="flex flex-wrap justify-center items-center">
                                <div class="w-full p-6 md:w-1/2">
                                    @if ($announcement->images->isNotEmpty())
        
                                    <div class="-m-1 flex flex-wrap md:-m-2">
                                        <div class="flex w-full flex-wrap items-center justify-center">
        
                                            @foreach ($announcement->images as $image)
                                                <div class="group relative w-1/2 p-1 md:p-2">
                                                    <img alt="gallery" class="block h-full w-full border-lg border-2 border-[#1f2426] rounded-lg object-cover object-center" src="{{Storage::url($image->path)}}" />
                                                

                                                    @if ($image->labels)
                                                        
                                                        <div class="text-sm absolute justify-center top-0 left-0 w-full h-full p-5 hidden group-hover:block bg-[#ffffff8a]">
                                                            
                                                            <p class="font-bold">
                                                                <i class="{{$image->adult}}"></i>
                                                                {{ __('ui.adultContent') }}
                                                            </p>

                                                            <p class="font-bold">
                                                                <i class="{{$image->spoof}}"></i>
                                                                {{ __('ui.spoofContent') }}
                                                            </p>

                                                            <p class="font-bold"> 
                                                                <i class="{{$image->medical}}"></i>
                                                                {{ __('ui.medicalContent') }}
                                                            </p>

                                                            <p class="font-bold">
                                                                <i class="{{$image->violence}}"></i>
                                                                {{ __('ui.violentContent') }}
                                                            </p>

                                                            <p class="font-bold">
                                                                <i class="{{$image->racy}}"></i>
                                                                {{ __('ui.racyContent') }}
                                                            </p>
                                                            <div class="flex flex-wrap gap-1 mt-2 mr-2">
                                                                @foreach ($image->labels as $label)
                                                                <div class="bg-[#9fe93f] rounded-full px-1">
                                                                    <p class="text-xs text-black-700">{{$label}}</p>
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    @endif
                                                </div>
                                                
                                            @endforeach
                                        
        
                                        </div>
                                    </div>   
                                        
                                    @else
        
                                    <div class="-m-1 flex flex-wrap md:-m-2">
                                        <div class="flex w-1/2 flex-wrap">
                                            <div class="w-1/2 p-1 md:p-2">
                                                <img alt="gallery" class="block h-full w-full border-lg border-4 border-[#1f2426] rounded-lg object-cover object-center" src="https://picsum.photos/300/300" />
                                            </div>
                                            <div class="w-1/2 p-1 md:p-2">
                                                <img alt="gallery" class="block h-full w-full border-lg border-4 border-[#1f2426] rounded-lg object-cover object-center" src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp" />
                                            </div>
                                            <div class="w-full p-1 md:p-2">
                                                <img alt="gallery" class="block h-full w-full border-lg border-4 border-[#1f2426] rounded-lg object-cover object-center" src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" />
                                            </div>
                                        </div>
                                        <div class="flex w-1/2 flex-wrap">
                                            <div class="w-full p-1 md:p-2">
                                                <img alt="gallery" class="block h-full w-full border-lg border-4 border-[#1f2426] rounded-lg object-cover object-center" src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp" />
                                            </div>
                                            <div class="w-1/2 p-1 md:p-2">
                                                <img alt="gallery" class="block h-full w-full border-lg border-4 border-[#1f2426] rounded-lg object-cover object-center" src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp" />
                                            </div>
                                            <div class="w-1/2 p-1 md:p-2">
                                                <img alt="gallery" class="block h-full w-full border-lg border-4 border-[#1f2426] rounded-lg object-cover object-center" src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(77).webp" />
                                            </div>
                                        </div>
                                    </div>
        
                                    @endif
                                </div>

                                <i class="text-green-700 fas fa-solid "></i>
    
                                <div class="w-full p-6 md:w-1/2">
                                    <p class="my-10 text-lg mx-5  text-black">{{ $announcement->body }}</p>
            
                                    <hr class=" mx-5 border-1 rounded border-black">

                                    <p class="text-center text-3xl my-5 bg-black rounded-3xl text-[#9fe93f]">{{ euro($announcement->price) }}</p>
            
                                    <hr class=" mx-5 border-1 rounded border-black">
            
                                    <div class="flex justify-between mx-5 mt-4">
                                        <p class=" text-black">{{ __('ui.createdOn') }} {{ $announcement->created_at->format('d/m/Y') }}</p>
                                        <p class=" text-black">{{ __('ui.author') }} {{ $announcement->user->name ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                                <div class="flex justify-center items-center mt-20">
                                    <form action="{{ route('revisor.accept_announcement', ['announcement' => $announcement]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn border-black border-2 mx-4">{{ __('ui.accept') }}</button>
                                    </form>
                                    <form action="{{ route('revisor.reject_announcement', ['announcement' => $announcement]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-refuse border-black border-2 mx-4">{{ __('ui.reject') }}</button>
                                    </form>
                                </div>
                        </div>

                    </div>

                @endforeach
                
            </div>
            
            <!--Carousel controls - prev item-->
            <button class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-[#9fe93f] hover:no-underline hover:opacity-90 hover:outline-none focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleControlsTest" data-te-slide="prev">
                <span class="inline-block h-8 w-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </span>
                <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
            </button>
            <!--Carousel controls - next item-->
            <button class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-[#9fe93f] hover:no-underline hover:opacity-90 hover:outline-none focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleControlsTest" data-te-slide="next">
                <span class="inline-block h-8 w-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
            </button>
        </div>
        
        @else

        <h2 class="font-bold text-3xl mx-auto text-center my-20">{{ __('ui.noAnnouncementsToRevise') }}</h2>

        @endif


    </section>



</x-layout-main>
