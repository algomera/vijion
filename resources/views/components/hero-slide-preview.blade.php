@props(['paragraph', 'btn_text', 'btn_url', 'small_centered_text', 'big_centered_text', 'coins_centered_text', 'background_url'])
<div class="relative isolate overflow-hidden bg-gray-900 py-16">
	@if(!$background_url)
		<div class="absolute inset-0 -z-10 h-full w-full object-cover bg-gray-700"></div>
	@else
		<img src="{{ asset($background_url) }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
	@endif
	<div class="mx-auto max-w-7xl px-6 lg:px-8">
		<div class="mx-auto max-w-2xl drop-shadow lg:mx-0">
			<p class="mb-6 text-5xl text-white line-clamp-3 h-[144px]">{!! formatString($paragraph) !!}</p>
			<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
				<div class="flex-auto">
					<a href="{{ $btn_url }}"
					   class="flex items-center space-x-3 text-white uppercase font-semibold tracking-tight underline">
						<span>{{ $btn_text }}</span>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none"
						     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
						     class="w-5 h-5 transform group-hover:translate-x-1 transition">
							<path stroke-linecap="round" stroke-linejoin="round"
							      d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="flex flex-col items-center justify-center drop-shadow">
		<p class="text-2xl text-brand">{{ $small_centered_text }}</p>
		<h2 class="text-9xl font-narrow font-bold text-brand">{{ $big_centered_text }}</h2>
		<div class="flex items-center space-x-2 mt-3 px-3 py-1 bg-white/70 border border-white text-white rounded">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
			     stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
				<path stroke-linecap="round" stroke-linejoin="round"
				      d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
			</svg>
			<span class="text-xl font-bold">{{ $coins_centered_text }}</span>
		</div>
	</div>
</div>