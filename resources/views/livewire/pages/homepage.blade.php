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
				<button type="button"
				        class="rounded-md bg-[#63184c] py-4 px-12 text-xs font-semibold text-white uppercase shadow-sm transition duration-300 hover:bg-[#7a2962] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#63184c]">
					Carica altro
				</button>
			</div>
		</section>
	</div>
	<section class="bg-gray-800 py-8">
		<h3 class="text-center text-3xl text-white font-medium mt-10 mb-6">Gli imperdibili</h3>
		<x-slider name="unmissable" class="container">
			@foreach($unmissables as $unmissable)
				<div class="swiper-slide">
					<x-coupon-card-highlight :coupon="$unmissable" bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" />
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
				<button type="button"
				        class="rounded-md bg-[#63184c] py-4 px-12 text-xs font-semibold text-white uppercase shadow-sm transition duration-300 hover:bg-[#7a2962] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#63184c]">
					Visualizza tutti
				</button>
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
				<span class="text-sm text-brand cursor-pointer hover:font-medium hover:text-brand">I più richiesti</span>
				<span class="text-sm text-gray-500 cursor-pointer hover:font-medium hover:text-brand">Gli ultimi arrivi</span>
				<span class="text-sm text-gray-500 cursor-pointer hover:font-medium hover:text-brand">Solo su Viji-Store</span>
				<span class="text-sm text-gray-500 cursor-pointer hover:font-medium hover:text-brand">In Scadenza!</span>
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
{{--				<x-coupon-card-highlight amount="45%" coins="85"--}}
{{--				                         :brand="['name' => 'Zalando', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Zalando_logo.svg/2560px-Zalando_logo.svg.png', 'category' => 'Abbigliamento e Scarpe']"--}}
{{--				                         bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"></x-coupon-card-highlight>--}}
{{--				<x-coupon-card-highlight amount="45%" coins="85"--}}
{{--				                         :brand="['name' => 'Zalando', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Zalando_logo.svg/2560px-Zalando_logo.svg.png', 'category' => 'Abbigliamento e Scarpe']"--}}
{{--				                         bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"></x-coupon-card-highlight>--}}
{{--				<x-coupon-card-highlight text_color="text-gray-800" amount="13%" coins="50"--}}
{{--				                         :brand="['name' => 'Dyson', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Dyson_logo.svg/2560px-Dyson_logo.svg.png', 'category' => 'Casa e Giardino']"--}}
{{--				                         bg="https://plus.unsplash.com/premium_photo-1677528816821-2e373e2602cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1041&q=80"></x-coupon-card-highlight>--}}
{{--				<x-coupon-card-highlight amount="45%" coins="85"--}}
{{--				                         :brand="['name' => 'Zalando', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Zalando_logo.svg/2560px-Zalando_logo.svg.png', 'category' => 'Abbigliamento e Scarpe']"--}}
{{--				                         bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"></x-coupon-card-highlight>--}}
{{--				<x-coupon-card-highlight amount="13%" coins="50"--}}
{{--				                         :brand="['name' => 'Notino', 'logo' => 'https://logos-download.com/wp-content/uploads/2021/01/Notino_Logo.png', 'category' => 'Salute e Bellezza']"--}}
{{--				                         bg="https://images.unsplash.com/photo-1679850136404-cff6c8714271?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2344&q=80"></x-coupon-card-highlight>--}}
{{--				<x-coupon-card-highlight amount="13%" coins="50"--}}
{{--				                         :brand="['name' => 'Dyson', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Dyson_logo.svg/2560px-Dyson_logo.svg.png', 'category' => 'Casa e Giardino']"--}}
{{--				                         bg="https://plus.unsplash.com/premium_photo-1677528816821-2e373e2602cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1041&q=80"></x-coupon-card-highlight>--}}
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