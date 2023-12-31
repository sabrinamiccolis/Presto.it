<nav class="flex w-full flex-wrap items-center justify-between bg-blackColor py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4 sticky top-0 z-40">
    <div class="flex w-full flex-wrap items-center justify-between sm:px-10 sm:container mx-auto">

        <!-- Left elements -->
        <div class="flex w-1/2 sm:w-1/5 items-center">
            <!-- Brand -->
            <a class="hidden mx-2 my-1 sm:flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0" href="{{route('home')}}">
                <img src="/img/p-logo.png" alt="Presto logo" width="50" height="50">
            </a>
            <a href="{{route('home')}}">
                <img src="/img/presto-logo.png" alt="Presto.it" width=150 class="sm:hidden">
            </a>
        </div>
        <!-- Left elements -->

        <!-- Central elements -->
        <div class="w-3/5 hidden sm:block px-5">
            <form class="flex" action="{{ route('announcements.search') }}" method="GET">
                <input name="searched" type="search" class="relative m-0 block w-[350px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 text-base font-normal leading-[2.4] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-white focus:border-2 focus:border-[#bfff39] focus:outline-nonedark:placeholder:text-neutral-200 motion-reduce:transition-none " placeholder="{{ __('ui.search') }}" aria-label="Search" aria-describedby="button-addon2" />
                <!--Search icon-->
                <button type="submit">
                    <span class="input-group-text flex items-center whitespace-nowrap rounded px-3 text-center text-base font-normal text-neutral-700 dark:text-neutral-200 bg-greenLight" id="basic-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </form>
        </div>
        <!-- Central elements -->

        <!-- Input di ricerca e bottone, nascosti per impostazione predefinita -->
        <form id="searchContainer" class="hidden absolute gap-2 items-center w-full justify-between z-40 bg-black"  action="{{ route('announcements.search') }}" method="GET">
            <input name="searched" type="search" id="mobileSearchInput" class="flex-grow p-2 relative m-0 ml-2 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-black bg-clip-padding px-3 text-base font-normal leading-[2.4] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-white focus:border-2 focus:border-[#9fe93f] focus:outline-nonedark:placeholder:text-neutral-200 motion-reduce:transition-none " placeholder="{{ __('ui.search') }}">
            <button type="submit" id="searchButton" class="btnNav max-sm:inline-block hidden mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>

        <!-- Right elements -->
        <div class="w-1/2 sm:w-1/5 flex justify-end items-center">

            {{-- search icon --}}
            <button id="activateSearch" class="btnNav max-sm:inline-block hidden mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
            </button>


            @auth
                @if (auth()->user()->email_verified_at)
                    <div class="flex justify-end items-center">
                        <a href="/announcements/create" class="btnNav text-xs lg:text-sm max-2xl:hidden inline-block font-bold">{{ __('ui.createAnnouncement') }}</a>

                        {{-- plus icon add announcements --}}
                        <a href="/announcements/create" class="btnNav max-2xl:inline-block hidden">
                          <svg width="20" height="20">
                            <line x1="10" y1="1" x2="10" y2="19" style="stroke:rgb(0,0,0);stroke-width:3" />
                            <line x1="1" y1="10" x2="19" y2="10" style="stroke:rgb(0,0,0);stroke-width:3" />
                          </svg>
                        </a>
                        <ul class="list-style-none flex flex-row pl-0 xl:pl-4" data-te-navbar-nav-ref>
                            <li class="relative px-2" data-te-dropdown-ref data-te-dropdown-alignment="end">
                                <!-- Dropdown trigger -->
                                <a class="hidden-arrow mr flex items-center text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400 motion-reduce:transition-none" href="#" id="dropdownMenuButton1" role="button" data-te-dropdown-toggle-ref aria-expanded="false">
                                    <!-- Dropdown hamburger icon -->
                                    <button class="btnNav">
                                        <svg width="20" height="20" viewBox="0 0 20 20">
                                            <rect x="0" y="1" width="20" height="3" fill="black" rx="2" />
                                            <rect x="0" y="8.5" width="20" height="3" fill="black" rx="2" />
                                            <rect x="0" y="16" width="20" height="3" fill="black" rx="2" />
                                        </svg>
                                    </button>
                                </a>
                                <!-- Dropdown menu -->
                                <ul class="absolute z-[1000] float-left hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                    <!-- Dropdown menu items -->
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="/announcements/create" data-te-dropdown-item-ref>{{ __('ui.createAnnouncement') }}</a>
                                    </li>
                                    @if (Auth::user()->role == 'revisor' || Auth::user()->role == 'admin')       
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="/announcements-to-revise" data-te-dropdown-item-ref>{{ __('ui.announcementsToRevise') }}</a>
                                        <span class="absolute top-8 right-1 text-white rounded-full bg-danger-600 text-xs flex justify-center items-center w-5 h-5">{{App\Models\Announcement::toBeRevisionedCount()}}</span>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="/announcements" data-te-dropdown-item-ref>{{ __('ui.allAnnouncementsNav') }}</a>
                                    </li>
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="{{ route('user.index') }}" data-te-dropdown-item-ref>{{ __('ui.yourAnnouncements') }}</a>
                                    </li>
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="{{ route('user.favorites') }}" data-te-dropdown-item-ref>{{ __('ui.favorites') }}</a>
                                    </li>
                                    @if (Auth::user()->role == 'admin')       
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="/admin/manage-users" data-te-dropdown-item-ref>{{ __('ui.usersManagement') }}</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="{{ route('auth.setting-password') }}" data-te-dropdown-item-ref>{{ __('ui.modifyPassword') }}</a>
                                    </li>
                                    @if (Auth::user()->role != 'revisor' && Auth::user()->role != 'admin') 
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 pr-7 py-2 text-sm font-normal text-neutral-700 hover:bg-[#9fe93f] active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="{{route('workUs')}}" data-te-dropdown-item-ref>{{ __('ui.workWithUs') }}</a>
                                    </li>
                                    @endif
                                    <li>
                                        <form action="/logout" method="POST" class="text-center">
                                            @csrf
                                            <button class="w-full hover:text-black hover:bg-danger p-2 font-bold border-1 border-red-800 text-lg" type="submit">{{ __('ui.logout') }}</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endif
            @else

                <a href="/login" class="btnNav max-xl:inline-block hidden mr-2">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.144"></g><g id="SVGRepo_iconCarrier"> <path d="M15 9H15.01M15 15C18.3137 15 21 12.3137 21 9C21 5.68629 18.3137 3 15 3C11.6863 3 9 5.68629 9 9C9 9.27368 9.01832 9.54308 9.05381 9.80704C9.11218 10.2412 9.14136 10.4583 9.12172 10.5956C9.10125 10.7387 9.0752 10.8157 9.00469 10.9419C8.937 11.063 8.81771 11.1823 8.57913 11.4209L3.46863 16.5314C3.29568 16.7043 3.2092 16.7908 3.14736 16.8917C3.09253 16.9812 3.05213 17.0787 3.02763 17.1808C3 17.2959 3 17.4182 3 17.6627V19.4C3 19.9601 3 20.2401 3.10899 20.454C3.20487 20.6422 3.35785 20.7951 3.54601 20.891C3.75992 21 4.03995 21 4.6 21H6.33726C6.58185 21 6.70414 21 6.81923 20.9724C6.92127 20.9479 7.01881 20.9075 7.10828 20.8526C7.2092 20.7908 7.29568 20.7043 7.46863 20.5314L12.5791 15.4209C12.8177 15.1823 12.937 15.063 13.0581 14.9953C13.1843 14.9248 13.2613 14.8987 13.4044 14.8783C13.5417 14.8586 13.7588 14.8878 14.193 14.9462C14.4569 14.9817 14.7263 15 15 15Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </a>
                <a href="/login" class="btn mr-2 max-xl:hidden inline-block">{{ __('ui.login') }}</a>
            @endauth

            <!-- Container del Dropdown -->
            <div class="relative my-auto">

                <!-- Trigger del Dropdown -->
                <button id="dropdownLanguageButton" class="dropdown-toggle">
                    <span class="fi fi-{{ session('country', 'it') }} text-2xl circlePath fis"></span>
                </button>

                <!-- Menu del Dropdown -->
                <ul id="dropdownLanguageMenu" class="absolute left-[-150px] top-[-24px] hidden min-w-max w-14 list-none mt-5 bg-opac py-1 text-base z-50 text-center rounded-full">
                    <div class="flex">
                        <li class="mx-2">
                            <x-country lang='it' country='it' />
                        </li>
                        <li class="mx-2">
                            <x-country lang='en' country='us' />
                        </li>
                        <li class="mx-2">
                            <x-country lang='fr' country='fr' />
                        </li>
                    </div>
                </ul>
            </div>

        </div>
        <!-- Right elements -->

    </div>

</nav>
