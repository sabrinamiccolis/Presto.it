<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.forgotPassword') }}</x-slot>



    <section class="">
        <div class="h-full">
            <!-- Left column container with background-->
            <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12 hidden lg:block">
                    <img class="md:w-5/6  mx-auto rounded shadow-lg shadow-[#1f2426] my-10 esaPath" src="https://picsum.photos/1000/1000" alt="">
                </div>

                <!-- Right column container -->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12 lg:mx-10">
                    <form method="POST" action="/forgot-password">
                        @csrf
                        <!--Sign in section-->
                        <div class="flex flex-row items-center justify-center lg:justify-start">
                            <p class="mb-0 mr-4 text-lg">{{ __('ui.forgotPassword') }}</p>
                        </div>

                        <!-- Separator between social media sign in and email/password sign in -->
                        <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                            <p class="mx-4 mb-0 text-center font-semibold dark:text-white">{{ __('ui.reset') }}</p>
                        </div>

                        <!-- Email input -->
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        @error('email')
                            <span class="text-danger-600 text-sm">{{ $message }}</span>
                        @enderror

                        <div class="relative mb-6">
                            <label for="email" class="label-form"> {{ __('ui.email') }} </label>
                            <input type="text" class="input-form  @error('email') border-danger @enderror" id="email" name="email" placeholder="Email" required />
                        </div>

                        <div class="mb-6 flex items-center justify-between">
                            <!-- Login button -->
                            <div class="text-center lg:text-left mx-auto">
                                <button type="submit" class="btn">{{ __('ui.sendRecoveryEmail') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </section>


</x-layout-main>
