@props(['coupon'])
<a href="{{ route('coupon', ['coupon' => $coupon->uuid]) }}"
   class="flex flex-col w-full h-full bg-white overflow-hidden transition ease-in-out duration-300 hover:cursor-pointer">
	<div class="flex-1 p-1.5 pb-0">
		<div class="relative w-full h-full">
			@if(!$coupon->bg)
				<img src="{{ url($coupon->brand->category->image_path) }}" alt="" class="aspect-video w-full object-cover">
			@else
				<img src="{{ url($coupon->bg) }}" alt="" class="aspect-video w-full object-cover">
			@endif
			<div class="absolute inset-0 grid place-items-center {{ $coupon->text_color }}">
				<div class="flex flex-col items-center text-sm">
					<span>sconto</span>
					<span class="text-6xl font-bold">{{ $coupon->amount }}{{ $coupon->type === 'percentage' ? '%' : '€' }}</span>
					@if($coupon->expires_date)
						<span class="underline">valido fino a:</span>
						<span class="uppercase font-bold">{{ \Carbon\Carbon::parse($coupon->expires_date)->monthName }}</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="bg-white h-16 relative">
		<div class="absolute w-full h-full flex items-center px-14">
			<img src="{{ url($coupon->brand->logo_path) }}" alt="{{ $coupon->brand->name }}" class="py-2 max-h-12 mx-auto">
		</div>
		<div class="absolute h-full top-0 right-2 flex items-center space-x-1 text-brand">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
			     stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
				<path stroke-linecap="round" stroke-linejoin="round"
				      d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
			</svg>
			<span class="font-black">{{ $coupon->coins }}</span>
		</div>
	</div>
</a>
