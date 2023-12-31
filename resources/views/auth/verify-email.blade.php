<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.verifyEmail') }}</x-slot>


    
    <h1 class="text-4xl sm:text-5xl my-14 xl:my-28 color-primary font-bold text-center">{{ __('ui.registrationSuccess') }}</h1>
    <p class="text-lg sm:text-center mx-5">{{ __('ui.emailSentConfirmation') }}</p>

    <div class="my-5 text-lg sm:text-center mb-40 mx-5">
        {{ __('ui.emailNotReceived') }}
        <form action="/email/verification-notification" method="POST" class="text-center my-5">
            @csrf
            <button class="btn">{{ __('ui.sendVerificationEmail') }}</button>
        </form>
    </div>



</x-layout-main>