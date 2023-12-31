<x-layout-main>

    <x-slot:title>{{ $title ?? __('ui.registration') }}</x-slot>


    <section class="">
        <div class="h-full">
            <!-- Left column container with background-->
            <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12 hidden lg:block">
                    <img class="md:w-5/6  mx-auto rounded shadow-lg shadow-[#1f2426] my-5 esaPath" src="https://picsum.photos/1000/1000" alt="">
                </div>

                <!-- Right column container -->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12 lg:mx-10">
                    <form action="/register" method="POST" id="registerForm">
                        @csrf
                        <!--Sign in section-->
                        <div class="flex flex-row items-center justify-center lg:justify-start">
                            <p class="mb-0 mr-4 text-lg">{{ __('ui.loginWith') }}</p>

                            <!-- facebook  -->
                            <a href="{{url('/login/facebook') }}" data-te-ripple-init data-te-ripple-color="light" class="btnSocial">
                                <!-- facebook  -->
                                <svg viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" class="mx-auto w-6 h-6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0"> <path d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z" id="Facebook"> </path> </g> </g> </g></svg>
                            </a>

                            <!-- Google  -->
                            <a href="{{ url('/login/google') }}" data-te-ripple-init data-te-ripple-color="light" class="btnSocial">
                                <!-- Google  -->
                                <svg viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" class="mx-auto w-6 h-6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-401.000000, -860.000000)"> <g id="Google" transform="translate(401.000000, 860.000000)"> <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05"> </path> <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335"> </path> <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853"> </path> <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4"> </path> </g> </g> </g> </g></svg>
                            </a>

                            <!-- Linkedin -->
                            <a href="{{ url('/login/linkedin') }}" data-te-ripple-init data-te-ripple-color="light" class="btnSocial">
                                <!-- Linkedin -->
                                <svg viewBox="0 0 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#000000" class="mx-auto w-6 h-6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055" fill="#0A66C2"> </path> </g> </g></svg>
                            </a>
                        </div>

                        <!-- Separator between social media sign in and email/password sign in -->
                        <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                            <p class="mx-4 mb-0 text-center font-semibold dark:text-white">{{ __('ui.or') }}</p>
                        </div>
                        
                        <!-- Name input -->
                        @error('name') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                        <div class="relative mb-6">
                            <label for="name" class="label-form">{{ __('ui.userName') }}</label>
                            <input type="text" class="input-form @error('name') border-danger @enderror" id="name" name="name" placeholder="{{ __('ui.name') }}" value="{{ old('name') }}" required maxlength="100"/>
                        </div>

                        <!-- Email input -->
                        @error('email') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                        <div class="relative mb-6">
                            <label for="email" class="label-form">{{ __('ui.email') }}</label>
                            <input type="email" class="input-form @error('email') border-danger @enderror" id="email" name="email" placeholder="{{ __('ui.email') }}" value="{{ old('email') }}" required maxlength="255"/>
                        </div>

                        <!-- City input -->
                        @error('city') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                        @error('prov') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                        <div class="flex justify-between">
                            <div class="relative mb-6 w-full mr-6">
                                <label for="city" class="label-form">{{ __('ui.city') }}</label>
                                <input type="text" class="input-form @error('city') border-danger @enderror" id="city" name="city" placeholder="{{ __('ui.city') }}" value="{{ old('city') }}" required maxlength="50"/>
                            </div>
                            <div class="relative mb-6">
                                <label for="prov" class="label-form">{{ __('ui.province') }}</label>
                                <input type="text" class="input-form @error('prov') border-danger @enderror" id="prov" name="prov" placeholder="{{ __('ui.province') }}" value="{{ old('prov') }}" required maxlength="4"/>
                            </div>
                        </div>


                        <!-- Birthday input -->
                        @error('birthday') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                        <div class="relative mb-6">
                            <label for="birthday" class="label-form">{{ __('ui.birthDate') }}</label>
                            <input type="date" class="input-form @error('birthday') border-danger @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}" required/>
                        </div>

                        <!-- Password input -->
                        @error('password') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                        <div class="relative mb-6">
                            <label for="password" class="label-form">{{ __('ui.password') }}</label>
                            <input type="password" class="input-form @error('password') border-danger @enderror" id="password" name="password" placeholder="{{ __('ui.password') }}" required minlength="8"/>
                        </div>

                        <!-- Password confirmation -->
                        @error('password_confirmation') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                        <div class="relative mb-6">
                            <label for="password_confirmation" class="label-form">{{ __('ui.confirmPassword') }}</label>
                            <input type="password" class="input-form @error('password_confirmation') border-danger @enderror" id="password_confirmation" name="password_confirmation" placeholder="{{ __('ui.confirmPassword') }}" required minlength="8"/>
                        </div>
                        
                        <div class="mb-6 flex items-center justify-between">
                            <!-- Remember me checkbox -->
                            @error('terms_accepted') <span class="text-danger-600 text-sm">{{ $message }}</span> @enderror
                            <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                <input class="check-form" type="checkbox" id="terms_accepted" name="terms_accepted" required/>
                                <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="terms_accepted">
                                    {{ __('ui.iAccept') }}
                                    <button type="button" id="termsLink" class="underline hover:text-blue-800">{{ __('ui.termsConditions') }}</button>
                                    {{ __('ui.andThe') }}
                                    <button type="button" id="privacyLink" class="underline hover:text-blue-800">{{ __('ui.privacyPolicy') }}</button>
                                </label>
                            </div>

                        </div>

                        <!-- Login button -->
                        <div class="text-center lg:text-left">
                            <button type="submit" class="btn">{{ __('ui.register') }}</button>

                            <!-- Register link -->
                            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
                                {{ __('ui.alreadyAccount') }}
                                <a href="/login" class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700">{{ __('ui.signin') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <div>
        <!-- Modale Termini e Condizioni -->
        <div id="termsModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-full sm:w-2/3 shadow-lg bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Termini e Condizioni</h3>
                    <div class="mt-2 px-7 py-3 text-left">
                        <h4>1. Introduzione</h4>
                        <p class="text-sm text-gray-800">Benvenuti su Presto.it, il vostro punto di riferimento per annunci e offerte in Italia. Utilizzando il nostro sito, accetti di essere vincolato dai seguenti termini e condizioni.</p>
                    
                        <h4>2. Servizi Offerti</h4>
                        <p class="text-sm text-gray-800">Forniamo una piattaforma per la pubblicazione di annunci personali, commerciali e promozionali, che copre una vasta gamma di categorie. Gli annunci sono soggetti a revisione e approvazione.</p>
                    
                        <h4>3. Inserimento e Gestione Annunci</h4>
                        <p class="text-sm text-gray-800">Gli annunci devono essere inseriti seguendo le linee guida del sito. La loro durata e visibilità possono variare. La gestione e la modifica degli annunci sono responsabilità degli utenti.</p>
                    
                        <h4>4. Pagamenti</h4>
                        <p class="text-sm text-gray-800">Per annunci in evidenza o servizi aggiuntivi, è previsto un pagamento. I dettagli dei costi saranno forniti al momento della scelta del servizio.</p>
                    
                        <h4>5. Modifiche e Cancellazioni</h4>
                        <p class="text-sm text-gray-800">Gli utenti possono modificare o cancellare i loro annunci in qualsiasi momento. In caso di cancellazione, non è previsto alcun rimborso per i servizi a pagamento già attivati.</p>
                    
                        <h4>6. Responsabilità</h4>
                        <p class="text-sm text-gray-800">Presto.it non è responsabile per la qualità, sicurezza o legalità degli annunci pubblicati. Gli utenti sono responsabili per il contenuto dei loro annunci.</p>
                    
                        <h4>7. Garanzie</h4>
                        <p class="text-sm text-gray-800">Non forniamo garanzie riguardo alla completezza, affidabilità o accuratezza delle informazioni presenti negli annunci. Gli utenti agiscono a proprio rischio.</p>
                    
                        <h4>8. Legge Applicabile</h4>
                        <p class="text-sm text-gray-800">Questi termini sono regolati dalla legge italiana e qualsiasi disputa sarà soggetta alla giurisdizione dei tribunali italiani.</p>
                    
                        <h4>9. Modifiche ai Termini</h4>
                        <p class="text-sm text-gray-800">Ci riserviamo il diritto di modificare questi termini in qualsiasi momento. Le modifiche saranno effettive dal momento della pubblicazione sul nostro sito web.</p>
                    
                        <h4>10. Contatti</h4>
                        <p class="text-sm text-gray-800">Per domande relative a questi termini, contattare info@presto.it.</p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button id="closeModal" class="px-4 py-2 bg-primary bg-hover text-white text-base font-medium w-auto shadow-sm">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modale Privacy Policy -->
        <div id="privacyModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-full sm:w-2/3 shadow-lg bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Privacy Policy</h3>
                    <div class="mt-2 px-7 py-3 text-left">
                        <h4>1. Raccolta dei Dati</h4>
                        <p class="text-sm text-gray-800">Raccogliamo dati personali come nome, indirizzo email e dettagli degli annunci per facilitare l'uso dei nostri servizi di annunci. Questi dati vengono raccolti tramite il nostro sito web, corrispondenza via email o direttamente dagli utenti.</p>
                    
                        <h4>2. Utilizzo dei Dati</h4>
                        <p class="text-sm text-gray-800">I dati raccolti vengono utilizzati per la gestione degli annunci, la comunicazione con gli utenti e per scopi amministrativi e legali.</p>
                    
                        <h4>3. Condivisione e Divulgazione</h4>
                        <p class="text-sm text-gray-800">Non condividiamo i tuoi dati personali con terze parti, tranne che per la necessaria esecuzione dei servizi o per obblighi legali.</p>
                    
                        <h4>4. Sicurezza dei Dati</h4>
                        <p class="text-sm text-gray-800">Adottiamo misure di sicurezza appropriate per proteggere i tuoi dati personali da accessi non autorizzati, alterazione o distruzione.</p>
                    
                        <h4>5. I Tuoi Diritti</h4>
                        <p class="text-sm text-gray-800">Hai il diritto di accedere, correggere o cancellare i tuoi dati personali. Puoi anche opporsi al trattamento dei tuoi dati per motivi legittimi.</p>
                    
                        <h4>6. Modifiche alla Privacy Policy</h4>
                        <p class="text-sm text-gray-800">Ci riserviamo il diritto di modificare questa policy in qualsiasi momento. Le modifiche saranno effettive dal momento della pubblicazione sul nostro sito web.</p>
                    
                        <h4>7. Contatti</h4>
                        <p class="text-sm text-gray-800">Per domande sulla nostra Privacy Policy, contattare info@presto.it.</p>
                    </div>
                    
                    <div class="items-center px-4 py-3">
                        <button id="closePrivacyModal" class="px-4 py-2 bg-primary bg-hover text-white text-base font-medium w-auto shadow-sm">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout-main>
