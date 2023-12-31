<x-layout-main>
    
    <x-slot:title>{{ $title ??  __('ui.announcement') . ': ' . $announcement->title }}</x-slot>
    
    
    
    <section class="">
        
        <h2 class="text-center mb-10 font-semibold text-4xl uppercase p-2 bg-black rounded-3xl py-1 text-[#9fe93f]">{{ $announcement->title }}</h2>
        <div class="text-center my-10">
            <a class="uppercase hover:bg-[#9fe93f] hover:p-2 hover:rounded-lg font-bold" href="{{ route('showCategory', ['category' => $announcement->category]) }}">{{ __('ui.' .$announcement->category->name) }}</a >
        </div>

        <x-success />

        <div class="flex max-md:flex-wrap justify-center items-center relative">   
            {{-- carousel --}}
            <div id="carouselExampleControls" class="relative border-[#1f2426] border-4 rounded-xl w-full sm:max-24 sm:w-1/2" data-te-carousel-init data-te-ride="carousel">
                <!--Carousel items-->
                <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                    <!--First item-->
                    @if ($announcement->images->isNotEmpty())

                    @foreach ($announcement->images as $image)

                    <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none @if (!$loop->first) hidden @endif" data-te-carousel-item @if ($loop->first) data-te-carousel-active @endif>
                        <img src="{{Storage::url($image->path)}}" class="block w-full rounded-md" alt="Wild Landscape" />
                    </div>

                    @endforeach

                    @else

                    <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item data-te-carousel-active>
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full rounded-md" alt="Wild Landscape" />
                    </div>
                    <!--Second item-->
                    <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item>
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full rounded-md" alt="Camera" />
                    </div>
                    <!--Third item-->
                    <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item>
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full rounded-md" alt="Exotic Fruits" />
                    </div>

                    @endif


            

                </div>

                @auth
                

                <div class="absolute top-[-23px] right-[-23px] z-30">
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

                <!--Carousel controls - prev item-->
                <button class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-[#9fe93f]hover:no-underline hover:opacity-90 hover:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleControls" data-te-slide="prev">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </span>
                    <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                </button>
                <!--Carousel controls - next item-->
                <button class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-[#9fe93f] hover:no-underline hover:opacity-90 hover:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleControls" data-te-slide="next">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                    <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                </button>
            </div>

            <div class="md:mx-24 w-full md:w-1/2">


                {{-- Prezzo e descrizione --}}
                <p class="my-10 text-lg sm:mx-5  text-black">{{ $announcement->body }}</p>
                <hr class=" mx-5 my-10 border-1 rounded border-black">
                <p class="text-center text-3xl my-5 bg-black rounded-3xl py-1 text-[#9fe93f]">{{ euro($announcement->price) }}</p>
                <hr class=" mx-5 my-10 border-1 rounded border-black">
                <!-- Bottone per aprire il form di contatto -->
                <div class="text-center my-5">
                    <button id="contactButton" class="btn btn-primary">{{ __('ui.contactUser') }}</button>
                </div>
                <div class="flex justify-between sm:mx-5">
                    <p class=" text-gray-600">{{ __('ui.createdOn') }} {{ $announcement->created_at->format('d/m/Y') }}</p>
                    <p class=" text-gray-600">{{ __('ui.author') }} {{ $announcement->user->name ?? '' }}</p>
                </div>
                
            </div>

            
    

        </div>

        <!-- Form Modale per inviare email -->
        <div id="contactForm" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('ui.contactUser') }}</h3>
                    <form action="{{ route('sendEmail') }}" method="POST">
                        @csrf
                        <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                        <div class="mt-2">
                            <input type="email" name="email" placeholder="{{ __('ui.yourEmail') }}" class="input-form" required>
                            <input type="text" name="name" placeholder="{{ __('ui.yourName') }}" class="input-form" required>
                            <textarea name="message" placeholder="{{ __('ui.message') }}" class="input-form" required></textarea>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="sendEmail" class="btn" type="submit">{{ __('ui.send') }}</button>
                            <button id="exitButton" class="bg-danger-400 border-2 border-danger-600 rounded-full px-1 py-1 hover:bg-danger-600 hover:border-danger-800 hover:text-white absolute top-3 right-3">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6L6 18"></path>
                                    <path d="M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>


</x-layout-main>
