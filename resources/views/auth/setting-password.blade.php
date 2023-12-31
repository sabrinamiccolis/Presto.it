<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.changePassword') }}</x-slot>
  
    <h2 class="text-center upper font-semibold text-4xl mx-auto">{{ __('ui.changePassword') }}</h2>

    <x-success />
  
    <section class="">
      <div class="h-full">
        <!-- Left column container with background-->
        <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
          <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12 hidden lg:block">
            <img class="md:w-5/6  mx-auto rounded shadow-lg shadow-[#1f2426] my-10 esaPath" src="https://picsum.photos/1000/1000" alt="">
          </div>

          <!-- Right column container -->
          <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12 lg:mx-10">
            <form method="POST" action="{{route('auth.setting-password.store')}}">
              @csrf

  
              <!-- Separator between social media sign in and email/password sign in -->
              <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                <p class="mx-4 mb-0 text-center font-semibold dark:text-white">{{ __('ui.changePassword') }}</p>
              </div>
  
              <!-- Current Password input -->
              @error('current_password') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
              <div class="relative mb-6">
                <label for="current_password" class="label-form">{{ __('ui.currentPassword') }}</label>
                <input type="password" class="input-form @error('current_password') border-danger @enderror" id="current_password" name="current_password" placeholder="{{ __('ui.currentPassword') }}" required/>
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