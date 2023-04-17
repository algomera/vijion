<div>
	<div x-data class="bg-gray-100 py-12">
		<div class="container">
			<h3 class="text-3xl font-bold mt-10 mb-12">I nostri brand</h3>
		</div>
	</div>
	<div class="container py-8">
		<div class="my-8">
			{{ $brands->links() }}
		</div>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-9">
			@forelse($brands as $brand)
				@foreach($brand->coupons()->available()->orderBy('amount', 'desc')->get() as $coupon)
					<x-coupon-card :coupon="$coupon"/>
				@endforeach
			@empty
				<p class="text-sm text-gray-400">Non ci sono coupon disponibili.</p>
			@endforelse
		</div>
		<div>
			{{ $brands->links() }}
		</div>
	</div>
</div>