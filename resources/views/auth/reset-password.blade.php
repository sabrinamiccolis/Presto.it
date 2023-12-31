<x-layout-main>

  <x-slot:title>{{ $title ?? __('ui.changePassword') }}</x-slot>



  <section class="">
    <div class="h-full">
      <!-- Left column container with background-->
      <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
        <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12 hidden lg:block">
          <img class="md:w-5/6  mx-auto rounded shadow-lg shadow-[#1f2426] my-10 esaPath" src="https://picsum.photos/1000/1000" alt="">
        </div>

        <!-- Right column container -->
        <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12 lg:mx-10">
          <form method="POST" action="/reset-password">
            @csrf
            <!--Sign in section-->
            <div class="flex flex-row items-center justify-center lg:justify-start">
              <p class="mb-0 mr-4 text-lg">{{ __('ui.forgotPassword') }}</p>
            </div>

            <!-- Separator between social media sign in and email/password sign in -->
            <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
              <p class="mx-4 mb-0 text-center font-semibold dark:text-white">{{ __('ui.changePassword') }}</p>
            </div>

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email input -->
            @error('email') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
            <div class="relative mb-6">
            <label for="email" class="label-form">{{ __('ui.email') }}</label>
              <input type="text" class="input-form @error('email') border-danger @enderror" id="email" name="email" placeholder="{{ __('ui.email') }}" required/>
            </div>

            <!-- Password input -->
            @error('password') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
            <div class="relative mb-6">
            <label for="password" class="label-form">{{ __('ui.newPassword') }}</label>
              <input type="password" class="input-form @error('password') border-danger @enderror" id="password" name="password" placeholder="{{ __('ui.newPassword') }}" required/>
            </div>

            <!-- Password confirmation input -->
            @error('password_confirmation') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
            <div class="relative mb-6">
            <label for="password_confirmation" class="label-form">{{ __('ui.confirmPassword') }}</label>
              <input type="password" class="input-form @error('password_confirmation') border-danger @enderror" id="password_confirmation" name="password_confirmation" placeholder="{{ __('ui.confirmPassword') }}" required/>
            </div>

            <!-- Login button -->
            <div class="text-center lg:text-left">
              <button type="submit" class="btn">{{ __('ui.changePassword') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


</x-layout-main>