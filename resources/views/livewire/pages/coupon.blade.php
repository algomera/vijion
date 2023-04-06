<div class="bg-gray-100">
	<div class="container py-14">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
			<div class="order-2 flex flex-col justify-center space-y-8 w-full lg:max-w-md lg:order-none">
				<div>
					<h3 class="text-xl font-bold mb-4">Regole di <span
								class="uppercase">{{ $coupon->brand->name }}</span></h3>
					<ul class="list-[circle] space-y-2">
						@foreach($coupon->brand->rules as $rule)
							<li>{{ $rule->body }}</li>
						@endforeach
					</ul>
				</div>
				<div>
					<h3 class="text-xl font-bold mb-4">Come funzionano i <span class="uppercase">VIJI-COINS</span> su
						<span class="uppercase">{{ $coupon->brand->name }}</span></h3>
					<p>Guadagnare VIJI-COINS è molto semplice, basta visualizzare i video in streaming presenti su
						vijion.it. Per concludere l’acquisto basterà aggiungere al carrello la card da una pagina scheda
						come questa e finalizzare l’acquisto all’interno del carrello.</p>
				</div>
				<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
					<div class="flex-auto">
						<a href="#rules"
						   class="flex items-center space-x-3 text-brand hover:text-brand">
							<span>Leggi le regole fondamentali</span>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							     stroke-width="1.5" stroke="currentColor"
							     class="w-5 h-5 transform group-hover:translate-y-1 transition">
								<path stroke-linecap="round" stroke-linejoin="round"
								      d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
			<div class="order-1 lg:order-none">
				<h3 class="text-2xl font-bold mb-4">{{ $coupon->brand->category->name }}</h3>
				<div class="flex flex-col w-full p-4 bg-white overflow-hidden">
					<div class="flex-1 pb-0">
						<div class="relative w-full h-full">
							@if(!$coupon->bg)
								<img src="{{ $coupon->brand->category->image_path }}" alt="" class="aspect-video w-full object-cover">
							@else
								<img src="{{ asset($coupon->bg) }}" alt="" class="aspect-video w-full object-cover">
							@endif
							<div class="absolute inset-0 grid place-items-center {{ $coupon->text_color }}">
								<div class="flex flex-col justify-center items-center bg-white w-32 h-32 rounded-full sm:w-44 sm:h-44">
									<span class="text-gray-800 font-bold">sconto</span>
									<span class="text-5xl text-brand font-bold sm:text-6xl">{{ $coupon->amount }}{{ $coupon->type === 'percentage' ? '%' : '€' }}</span>
									@if($coupon->expires_date)
										<span class="underline text-gray-800 text-xs">valido fino a:</span>
										<span class="uppercase text-brand font-bold">{{ \Carbon\Carbon::parse($coupon->expires_date)->monthName }}</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="flex flex-col space-y-2 items-center justify-between rounded-full bg-gray-50 py-1.5 px-1.5 mt-4 sm:flex-row sm:space-y-0">
						<div class="flex items-center ml-1 text-gray-700 px-4 whitespace-nowrap">
							<p>L'acquisto di questo prodotto equivale a:</p>
						</div>
						<div class="bg-brand rounded-full text-white py-2.5 px-4 whitespace-nowrap">
							<p class="font-bold text-lg">
								{{ $coupon->coins }} <span class="inline-block text-xs font-bold">VIJI-COINS</span>
							</p>
						</div>
					</div>
					<div class="grid items-center grid-cols-1 gap-3 mt-5 sm:grid-cols-2 sm:gap-8">
						<img src="{{ $coupon->brand->logo_path }}" alt="{{ $coupon->brand->name }}"
						     class="py-2 max-h-24 max-w-[200px] mx-auto">
						<x-primary-button wire:click="addToCart"
						                  :disabled="auth()->check() && auth()->user()->couponInCart($coupon->id)">
							{{ auth()->check() && auth()->user()->couponInCart($coupon->id) ? 'Aggiunto al carrello' : 'Aggiungi al carrello' }}
						</x-primary-button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="rules" class="bg-white py-12">
	<div class="container max-w-5xl">
		<h3 class="text-xl font-bold mb-8">
			Le regole per spendere al meglio i tuoi <span class="uppercase text-brand">VIJI-COINS</span>
		</h3>
		<div class="space-y-6">
			<div class="space-y-2">
				<div class="flex font-bold space-x-2.5">
					<span class="text-brand">1</span>
					<p>Acquista lo sconto su VIJI-STORE prima di comprare i tuoi prodotti su <span
								class="uppercase">{{ $coupon->brand->name }}</span></p>
				</div>
				<p class="text-gray-700 leading-relaxed">
					Fondamentale è acquistare lo sconto su VIJI-STORE prima di passare allo shopping e alla cassa di
					<span class="uppercase">{{ $coupon->brand->name }}</span>. Comprare prima su <span
							class="uppercase">{{ $coupon->brand->name }}</span> per poi entrare nel sito VIJI-STORE non
					permetterà all’utente di
					utilizzare lo sconto, in quanto l’acquisto in questione non potrà essere collegabile.
				</p>
			</div>
			<div class="space-y-2">
				<div class="flex font-bold space-x-2.5">
					<span class="text-brand">2</span>
					<p>Il carrello deve essere vuoto prima del click su <span
								class="uppercase">VIJI-STORE</span></p>
				</div>
				<p class="text-gray-700 leading-relaxed">
					Prima di passare da VIJI-STORE controlla sempre che il carrello sia vuoto e se c’è già qualcosa da
					una precedente sessione svuotalo. Alcuni negozi hanno delle regole di attribuzione stringenti e in
					casi come questo potrebbero non pagarci la nostra commissione e noi non potremmo pagarti il tuo
					codice sconto.
				</p>
			</div>
			<div class="space-y-2">
				<div class="flex font-bold space-x-2.5">
					<span class="text-brand">3</span>
					<p>Non tralasciare mai i cookies</p>
				</div>
				<p class="text-gray-700 leading-relaxed">
					I cookie hanno un ruolo fondamentale per far funzionare il sistema e permettere a <span
							class="uppercase">{{ $coupon->brand->name }}</span> di
					riconoscerci il merito dell’acquisto, quindi devi accettare tutti i cookie e non limitarli in alcun
					modo, né con il tuo browser, né con un ad blocker o altri software per il blocco della pubblicità.
					Controlla il tuo status.
				</p>
			</div>
			<hr class="!my-9">
			<p class="text-gray-700 leading-relaxed">
				Se sei sicuro di aver fatto tutto bene e dopo 24 ore non ricevi nessuna email con lo sconto per <span
						class="uppercase">{{ $coupon->brand->name }}</span>,
				effettua subito una segnalazione su VIJI-STORE. Anche noi guadagniamo solo quando possiamo attribuire
				uno sconto, quindi faremo tutto quello che potremo per ottenere quello che ci spetta.
			</p>
		</div>
	</div>
</div>
