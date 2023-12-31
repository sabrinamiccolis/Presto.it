@if(session()->has('success'))
    <div class="text-center bg-success-300 rounded-md border-2 border-success-900 py-3 mb-5 w-full sm:w-96 mx-auto">
        {{ session('success') }}
    </div>
@elseif (session()->has('alert'))
    <div class="text-center bg-danger-400 rounded-md border-2 border-danger-900 py-3 mb-5 w-full sm:w-96 mx-auto">
        {{ session('alert') }}
    </div>
@endif