<div class="p-4">
	<div class="flex justify-end">
		<x-icon wire:click="$emit('closeModal')" name="close"
		        class="w-8 h-8 text-gray-400 cursor-pointer hover:text-gray-500"></x-icon>
	</div>
	<div class="flex flex-col items-center space-y-7">
		<div>
			<img class="h-8 w-auto" src="{{ asset('/images/logo.png') }}" alt="">
		</div>
		<div class="text-center">
			<p>Accedendo tramite email e password di VIJION, potrai visualizzare ed acquistare su VIJI-STORE tramite i
				VIJI-COINS guadagnati</p>
		</div>
		<form wire:submit.prevent="login" class="w-full space-y-4">
			<x-input wire:model="email" type="text" name="email" label="Email"></x-input>
			<x-input wire:model="password" type="password" name="password" label="Password"></x-input>
			@if (Route::has('password.request'))
				<a href="{{ route('password.request') }}"
				   class="inline-block text-sm underline text-brand hover:text-brand-light rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand">
					Password dimenticata?
				</a>
			@endif
			<button type="submit"
			        @if(!$email || !$password) disabled @endif
			        class="w-full rounded-md bg-brand-purple py-4 px-6 text-xs font-semibold text-white uppercase transition duration-300 hover:bg-brand-purple-light focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#63184c] disabled:bg-gray-200">
				Continua
			</button>
			<div>
				@if (session()->has('error'))
					<div class="text-sm text-red-600 text-center">
						{{ session('error') }}
					</div>
				@endif
			</div>
		</form>
		<div class="w-full !mt-3">
			<div class="relative">
				<div class="absolute inset-0 flex items-center" aria-hidden="true">
					<div class="w-full border-t border-gray-300"></div>
				</div>
				<div class="relative flex justify-center">
					<span class="bg-white px-2 text-sm text-gray-400">oppure accedi con</span>
				</div>
			</div>
			<div class="flex items-center justify-center space-x-4 mt-7 mb-3">
				<svg id="accesso_con_google" data-name="accesso con google" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80">
					<g id="Ellisse_2" data-name="Ellisse 2" fill="#fff" stroke="#d7dadb" stroke-width="1">
						<circle cx="40" cy="40" r="40" stroke="none"/>
						<circle cx="40" cy="40" r="39.5" fill="none"/>
					</g>
					<g id="google" transform="translate(25.952 25.625)">
						<path id="Tracciato_31" data-name="Tracciato 31" d="M7.3,11.7A8.478,8.478,0,0,1,15.37,5.881a8.311,8.311,0,0,1,5.293,1.9l4.183-4.182A14.365,14.365,0,0,0,2.48,7.966Z" transform="translate(-0.995)" fill="#ea4335"/>
						<path id="Tracciato_32" data-name="Tracciato 32" d="M20.207,33.022a8.865,8.865,0,0,1-4.84,1.291,8.478,8.478,0,0,1-8.054-5.778L2.474,32.21a14.333,14.333,0,0,0,12.894,7.984A13.7,13.7,0,0,0,24.752,36.6l-4.544-3.578Z" transform="translate(-0.992 -11.444)" fill="#34a853"/>
						<path id="Tracciato_33" data-name="Tracciato 33" d="M33.385,33.031A14.321,14.321,0,0,0,37.721,22.25a11.964,11.964,0,0,0-.326-2.614H24v5.555h7.71a6.479,6.479,0,0,1-2.869,4.262Z" transform="translate(-9.625 -7.875)" fill="#4a90e2"/>
						<path id="Tracciato_34" data-name="Tracciato 34" d="M6.321,22.426a8.594,8.594,0,0,1-.013-5.394L1.485,13.3a14.546,14.546,0,0,0,0,12.8Z" transform="translate(0 -5.334)" fill="#fbbc05"/>
					</g>
				</svg>
				<svg id="accedi_con_faebook" data-name="accedi con faebook" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80">
					<circle id="Ellisse_3" data-name="Ellisse 3" cx="40" cy="40" r="40" fill="#3c5a99"/>
					<g id="facebook-icon" transform="translate(28.224 28.452)">
						<path id="Tracciato_35" data-name="Tracciato 35" d="M15.5,3.662c-1.432,0-1.839.635-1.839,2.035V8.009h3.809L17.1,11.752H13.663V23.1H9.1V11.752H6.03V8.008H9.106V5.762C9.106,1.985,10.62,0,14.868,0a21.969,21.969,0,0,1,2.653.163V3.678" fill="#fff"/>
					</g>
				</svg>
			</div>
		</div>
	</div>
</div>
