<div class="p-4">
	<div class="flex justify-end">
		<x-heroicon-o-x-mark wire:click="$emit('closeModal')" class="w-8 h-8 text-gray-300 cursor-pointer hover:text-gray-500" />
	</div>
	<div class="flex flex-col items-center space-y-7">
		<div>
			<img class="h-8 w-auto" src="{{ asset('/images/logo.png') }}" alt="">
		</div>
		<div class="text-center">
			<p>Accedendo tramite email e password di VIJION, potrai visualizzare ed acquistare su VIJI-STORE tramite i
				VIJI-COINS guadagnati</p>
		</div>
		<div class="w-full">
			<nav class="flex space-x-4" aria-label="Tabs">
				@foreach($tabs as $k => $tab)
					<div wire:click="$set('currentTab', '{{ $k }}')"
					     class="{{ $currentTab === $k ? 'bg-brand-purple-light/10 text-brand-purple' : 'text-gray-500 hover:text-gray-700 hover:cursor-pointer' }} w-full rounded-md px-3 py-2 text-center text-sm capitalize font-semibold">{{ $tab }}</div>
				@endforeach
			</nav>
		</div>
		<form wire:submit.prevent="{{$currentTab}}" class="w-full space-y-4">
			@if($currentTab === 'register')
				<div class="grid grid-cols-2 gap-4">
					<x-input wire:model.defer="first_name" type="text" name="first_name" label="Nome"></x-input>
					<x-input wire:model.defer="last_name" type="text" name="last_name" label="Cognome"></x-input>
				</div>
			@endif
			<x-input wire:model="email" type="text" name="email" label="Email"></x-input>
			<div class="grid {{ $currentTab === 'register' ? 'grid-cols-2' : 'grid-cols-1' }} gap-4">
				<x-input wire:model="password" type="password" name="password" label="Password"></x-input>
				@if($currentTab === 'register')
					<x-input wire:model.defer="password_confirmation" type="password" name="password_confirmation"
					         label="Conferma password"></x-input>
				@endif
			</div>
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
					<span class="bg-white px-2 text-sm text-gray-400">oppure {{ $tabs[$currentTab] }} con</span>
				</div>
			</div>
			<div class="flex items-center justify-center space-x-4 mt-7 mb-3">
				<x-secondary-button wire:click="auth0login">Accedi tramite Auth0</x-secondary-button>
			</div>
		</div>
	</div>
</div>
