<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ $title ?? config('app.name') }}</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="body_bg flex flex-col min-h-screen">
    
    <header class="headerColor py-5 hidden sm:block">
        <a href="{{route('home')}}"><img src="/img/presto-logo.png" alt="Presto.it" width=200 class="mx-auto"></a>
    </header>
    
    <x-navbar />
    

    <div class="my-10 flex overflow-x-scroll custom-scrollbar lg:overflow-x-hidden">
        @foreach ($categories as $category)
        <div class="mx-auto">
            <div class="flex flex-col justify-center items-center text-[#1f2426] hover:bg-[#9fe93f] rounded-lg p-2 ">
                <a class="uppercase font-semibold px-3 text-center" href="{{ route('showCategory', compact('category')) }}">
                    @if ($category->id == 1) 
                    <i class="fa-2x fa-solid fa-shirt block"></i>
                    @elseif ($category->id == 2)
                    <i class="fa-2x fa-solid fa-tree block"></i>
                    @elseif ($category->id == 3)
                    <i class="fa-2x fa-solid fa-house block"></i>
                    @elseif ($category->id == 4)
                    <i class="fa-2x fa-solid fa-computer block"></i>
                    @elseif ($category->id == 5)
                    <i class="fa-2x fa-solid fa-basketball block"></i>
                    @elseif ($category->id == 6)
                    <i class="fa-2x fa-solid fa-dog block"></i>
                    @elseif ($category->id == 7)
                    <i class="fa-2x fa-solid fa-car-side block"></i>
                    @elseif ($category->id == 8)
                    <i class="fa-2x fa-solid fa-compass-drafting block"></i>
                    @elseif ($category->id == 9)
                    <i class="fa-2x fa-solid fa-guitar block"></i>
                    @elseif ($category->id == 10)
                    <i class="fa-2x fa-solid fa-book block"></i>
                    @endif
                    
                    {{ __('ui.' .$category->name) }}
                </a>
            </div>
        </div>
        @endforeach
    </div>

    
    <main class=" container my-10 mx-auto grow">
        
        
        {{ $slot }}
        
    </main>
    
    <x-footer />
    
    
    @livewireScripts
    <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    
</body>

</html>