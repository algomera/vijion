<div class="p-4">
	<div class="flex justify-end">
		<x-icon name="close" class="w-8 h-8 text-gray-400"></x-icon>
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
			<x-input wire:model.defer="email" type="text" name="email" label="Email"></x-input>
			<x-input wire:model.defer="password" type="password" name="password" label="Password"></x-input>
			@if (Route::has('password.request'))
				<a href="{{ route('password.request') }}"
				   class="inline-block text-sm text-brand hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand">
					Password dimenticata?
				</a>
			@endif
			<button type="submit"
			        class="w-full rounded-md bg-[#63184c] py-4 px-6 text-xs font-semibold text-white uppercase shadow-sm transition duration-300 hover:bg-[#7a2962] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#63184c] disabled:opacity-25">
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
	</div>
</div>
