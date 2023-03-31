<div>
	<div class="container">
		<div class="mt-4">
			<x-slider name="hero-swiper">
				@foreach($slides as $slide)
					<div class="swiper-slide">
						<x-hero-slide :slide="$slide"></x-hero-slide>
					</div>
				@endforeach
			</x-slider>
		</div>
		<section class="pt-8 pb-12">
			<h3 class="text-center text-3xl font-bold mt-10 mb-6">I nostri brand</h3>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-9">
				@foreach($our_brands as $our_brand)
					<x-coupon-card :coupon="$our_brand->coupons()->orderBy('amount', 'desc')->first()"/>
				@endforeach
			</div>
			<div class="flex justify-center">
				<x-primary-button>Carica altro</x-primary-button>
			</div>
		</section>
	</div>
	<section class="bg-gray-800 py-8">
		<h3 class="text-center text-3xl text-white font-medium mt-10 mb-6">Gli imperdibili</h3>
		<x-slider name="unmissable" class="container">
			@foreach($unmissables as $unmissable)
				<div class="swiper-slide">
					<x-coupon-card-highlight :coupon="$unmissable"
					                         bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"/>
				</div>
			@endforeach
			<x-slot:pagination>
				<div class="swiper-pagination"></div>
			</x-slot:pagination>
		</x-slider>
	</section>
	<div class="container">
		<section class="my-8">
			<h3 class="text-center text-2xl font-bold mt-10 mb-6">Offerte della settimana</h3>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-9">
				@foreach($week_offers as $week_offer)
					<x-coupon-card :coupon="$week_offer"/>
				@endforeach
			</div>
			<div class="flex justify-center">
				<x-primary-button>Visualizza tutti</x-primary-button>
			</div>
		</section>
		<section class="my-8">
			<div class="grid grid-cols-2 gap-8">
				<x-category-card category="Tutto su Elettronica" url="#"
				                 bg="https://images.unsplash.com/photo-1603574670812-d24560880210?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1480&q=80"></x-category-card>
				<x-category-card category="Casa e Giardino" url="#"
				                 bg="https://images.unsplash.com/photo-1492496913980-501348b61469?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"></x-category-card>
				<x-category-card-highlight url="#"
				                           subtitle="Non la solita cravatta, ma <strong>La Cravatta</strong> e mille altre idee con i Nostri Brand per:"
				                           title="Festa del Papà"></x-category-card-highlight>
			</div>
		</section>
	</div>
	<section class="bg-gray-100 py-10">
		<div class="container space-y-5">
			<div class="flex items-center space-x-6">
				@foreach($tabs as $k => $tab)
					<span wire:click="$set('selectedTab', '{{ $k }}')"
					      class="text-sm {{ $selectedTab === $k ? 'text-brand' : 'cursor-pointer text-gray-500 hover:text-brand' }}">{{ $tab }}</span>
				@endforeach
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
				@foreach($filtered_coupons as $coupon)
					<x-coupon-card-highlight :coupon="$coupon"
					                         bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"></x-coupon-card-highlight>
				@endforeach
			</div>
		</div>
	</section>
</div>
@push('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
@endpush
@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
	<script>
        const heroswiper = new Swiper('.hero-swiper', {
            slidesPerView: 1,
            direction: 'horizontal',
            loop: false,
            autoplay: true,
            spaceBetween: 16,
            speed: 1000,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        const unmissable = new Swiper('.unmissable', {
            slidesPerView: 3,
            direction: 'horizontal',
            loop: false,
            autoplay: true,
            spaceBetween: 16,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
	</script>
@endpush