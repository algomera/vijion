<div>
	<div x-data class="bg-gray-100 py-12">
		<div class="container">
			<h3 class="text-3xl font-bold mt-10 mb-12">{{ $brand->name }}</h3>
		</div>
	</div>
	<div class="container py-8">
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-9">
			@forelse($coupons as $coupon)
				<x-coupon-card :coupon="$coupon"/>
			@empty
				<p class="text-sm text-gray-400">Non ci sono coupon per questo brand.</p>
			@endforelse
		</div>
	</div>
</div>
