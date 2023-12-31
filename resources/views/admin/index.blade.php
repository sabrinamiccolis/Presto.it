<x-layout-main>
    
    <x-slot:title>{{ $title ??  __('ui.revisorPanel') }}</x-slot>
    
    <section class="">
        
        <h2 class="text-center font-semibold text-4xl uppercase">{{ __('ui.usersManagement') }}</h2>
        
        <x-success /> 
        
        <div class="mx-auto mt-8 flex flex-wrap justify-center">

            <div class="w-full md:w-1/2">

                <h3 class="text-center text-xl font-bold my-5">{{ __('ui.revisorsList') }}</h3>

                <ul class="mx-5 overflow-y-scroll h-[40rem] px-2 custom-scrollbar">
                    
                    @foreach($users as $user)
                    
                    @if($user->role == 'revisor')
                    
                    <li class="py-3 sm:py-4 w-full bg-white rounded-md my-3 px-4 mx-auto list-none flex justify-between items-center">
                        <div class="">
                            <form action="{{ route('admin.user.changeRole', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="role" class="text-gray-700 border-2 border-[#9fe93f] rounded-md mb-2">
                                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>{{ __('ui.customer') }}</option>
                                    <option value="revisor" {{ $user->role == 'revisor' ? 'selected' : '' }}>{{ __('ui.revisor') }}</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ __('ui.admin') }}</option>
                                </select>
                                <button type="button" class="roleChangeTrigger">
                                    <i class="fa fa-check-circle text-[#9fe93f]"></i>
                                </button>
                            </form>
                            <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                                {{ $user->name }}  
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div class="flex flex-col justify-between items-center gap-3">  
                            <a class="hidden md:block btnAds" href="{{route('admin.menage.announcements', $user)}}">{{ __('ui.announcements') }}</a>

                            <a class="block md:hidden btnAds" href="{{route('admin.menage.announcements', $user)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        
                            <form action="{{ route('admin.user.delete', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="userDeletionTrigger hidden md:block bg-danger-400 border-2 border-danger-600 rounded-full px-2 py-1 hover:bg-danger-600 hover:border-danger-800 hover:text-white font-semibold uppercase">{{ __('ui.delete') }}</button>
                                <button class="userDeletionTrigger block md:hidden bg-danger-400 border-2 border-danger-600 rounded-full px-1 py-1 hover:bg-danger-600 hover:border-danger-800 hover:text-white font-semibold uppercase">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6L6 18"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </li>     
                    @endif
                        
                    @endforeach
                        
                </ul>

            </div>

            
            <div class="w-full md:w-1/2">

                <h3 class="text-center text-xl font-bold my-5">{{ __('ui.usersList') }}</h3>

                <ul class="mx-5 overflow-y-scroll h-[40rem] px-2 custom-scrollbar">
                    
                @foreach($users as $user)
                    
                    @if($user->role == 'customer')
                    
                    <li class="py-3 sm:py-4 w-full bg-white rounded-md my-3 px-4 mx-auto list-none flex justify-between items-center">
                        
                        <div>
                            <form action="{{ route('admin.user.changeRole', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="role" class="text-gray-700 border-2 border-[#9fe93f] rounded-md mb-2">
                                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>{{ __('ui.customer') }}</option>
                                    <option value="revisor" {{ $user->role == 'revisor' ? 'selected' : '' }}>{{ __('ui.revisor') }}</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ __('ui.admin') }}</option>
                                </select>
                                <button type="button" class="roleChangeTrigger">
                                    <i class="fa fa-check-circle text-[#9fe93f]"></i>
                                </button>
                            </form>
                            <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                                {{ $user->name }}      
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div class="flex flex-col justify-center gap-3 items-center">  
                            <a class="hidden md:block btnAds" href="{{route('admin.menage.announcements', $user)}}">{{ __('ui.announcements') }}</a>

                            <a class="block md:hidden btnAds" href="{{route('admin.menage.announcements', $user)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('admin.user.delete', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="userDeletionTrigger hidden md:block bg-danger-400 border-2 border-danger-600 rounded-full px-2 py-1 hover:bg-danger-600 hover:border-danger-800 hover:text-white font-semibold uppercase">{{ __('ui.delete') }}</button>
                                <button class="userDeletionTrigger block md:hidden bg-danger-400 border-2 border-danger-600 rounded-full px-1 py-1 hover:bg-danger-600 hover:border-danger-800 hover:text-white font-semibold uppercase">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6L6 18"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </li>            
                        
                    @endif
                    
                @endforeach         
                </ul>

            </div>

            
            <div class="w-full">

                <h3 class="text-center text-xl font-bold my-5">{{ __('ui.adminList') }}</h3>

                <ul class="mx-5">
                    
                @foreach($users as $user)
                    
                    @if($user->role == 'admin')
                    
                    <li class="py-3 sm:py-4 w-full bg-white rounded-md my-3 px-4 mx-auto list-none flex justify-between items-center">
                        
                        <div>
                            <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                                {{ $user->name }}      
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div class="flex flex-col justify-center items-center">  
                            <a class="hidden md:block btnAds" href="{{route('admin.menage.announcements', $user)}}">{{ __('ui.announcements') }}</a>

                            <a class="block md:hidden btnAds" href="{{route('admin.menage.announcements', $user)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>

                    </li>            
                        
                    @endif
                    
                @endforeach         
                </ul>

            </div>

        </div>

    </section>

    <!-- Modale Cambio Ruolo -->
    <div id="roleChangeModal" class="z-50 hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('ui.changeRole') }}</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">{{ __('ui.changeRoleConfirm')}}</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="cancelRoleChange" class="px-4 py-2 bg-gray-200 text-gray-900 rounded hover:bg-gray-300">{{ __('ui.cancel') }}</button>
                    <button id="confirmRoleChange" class="ml-3 px-4 py-2 bg-[#9fe93f] text-black rounded hover:bg-[#defb06]">{{ __('ui.confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale Eliminazione Utente -->
    <div id="userDeletionModal" class="z-50 hidden fixed inset-0 bg-gray-600 bg-opacity-50 bg-op overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('ui.deleteUser') }}</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">{{ __('ui.deleteUserConfirm') }}</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="cancelUserDeletion" class="px-4 py-2 bg-gray-200 text-gray-900 rounded hover:bg-gray-300">{{ __('ui.cancel') }}</button>
                    <button id="confirmUserDeletion" class="ml-3 px-4 py-2 bg-danger-500 text-white rounded hover:bg-danger-700">{{ __('ui.confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

            
            
</x-layout-main>
        