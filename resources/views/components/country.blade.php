<form action="{{ route('set_language_country', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="bg-transparent border-0" data-lang="{{ $lang }}">
        <span class="fi fi-{{ $country }} fis text-2xl circlePath"></span>
    </button>
</form>