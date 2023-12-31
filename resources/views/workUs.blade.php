<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.workWithUs') . ('!') }}</x-slot>



    <section class="flex justify-center mx-auto">


        <!-- Right column container -->
        <div class="my-12 md:mb-0 md:w-8/12 lg:w-8/12 xl:w-8/12">
            <form method="GET" action="/become-user-revisor">
                @csrf
                <!--Sign in section-->
                <!-- Separator between social media sign in and email/password sign in -->
                <div class="mb-24 flex items-center before:mt-0.5 before:flex-1 before:border-t-2 before:border-black after:mt-0.5 after:flex-1 after:border-t-2 after:border-black">
                    <p class="mx-4 mb-0 text-5xl text-center font-semibold text-black">{{ __('ui.workWithUs') . ('!') }}</p>
                </div>

                <x-success />
                
                <h2 class="mb-6 text-2xl font-semibold italic text-center">{{ __('ui.workWithUsDescr') }}</h2>


                <div class="flex flex-wrap mb-20 mx-auto justify-center items-center">


                    <div class="mb-5 w-full sm:w-1/2 text-md">
                        <p class="xl:mx-24 text-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis dicta accusantium at. Expedita aliquam impedit eligendi, esse quisquam dolore, ratione cumque vel quaerat animi ipsa repellat ad deleniti saepe eaque exercitationem accusamus vero delectus perspiciatis deserunt odio. Quis labore quibusdam quod, ducimus repellat magni.</p>
                    </div>
                    
                    <div class="w-full sm:w-1/2">
                        <img class="shadow-lg shadow-[#1f2426]" src="https://picsum.photos/1000/1000" alt="">
                    </div>
                </div>

                <h2 class="mb-6 text-xl font-semibold italic text-center">{{ __('ui.workWithUsDescr2') }}</h2>


                <div class="flex flex-wrap mb-20 mx-auto justify-center items-center">

                    <div class="mb-5 w-full sm:w-1/2">
                        <img class="shadow-lg shadow-[#1f2426]" src="https://picsum.photos/1000/1000" alt="">
                    </div>

                    <div class="w-full sm:w-1/2 text-md">
                        <p class="ms-4 xl:mx-24 text-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis dicta accusantium at. Expedita aliquam impedit eligendi, esse quisquam dolore, ratione cumque vel quaerat animi ipsa repellat ad deleniti saepe eaque exercitationem accusamus vero delectus perspiciatis deserunt odio. Quis labore quibusdam quod, ducimus repellat magni.</p>
                    </div>
                    
                </div>


                <div class="relative mb-6">
                    <label for="description" class="label-form">{{ __('ui.whyRevisor') }}</label>
                    <textarea class="input-form" id="description" name="description" placeholder="{{ __('ui.description') }}" required rows="7"></textarea>
                </div>

                <div class="mb-6 flex items-center justify-between">
                    <!-- Login button -->
                    <div class="mb-12 text-center lg:text-left mx-auto">
                        <button type="submit" class="btn">{{ __('ui.sendApplication') }}</button>
                    </div>
                </div>
            </form>
        </div>



    </section>


</x-layout-main>
