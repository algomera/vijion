<div>
	<div x-data class="bg-gray-100 py-12">
		<div class="container">
			<h3 class="text-3xl font-bold mt-10 mb-12">Categorie</h3>
		</div>
	</div>
	<div class="container py-8">
		<div class="my-8">
			{{ $categories->links() }}
		</div>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-9">
			@forelse($categories as $category)
				<a href="{{ route('category', $category->slug) }}" class="group relative aspect-video col-span-2 sm:aspect-none sm:relative sm:h-full md:col-span-1">
					<img src="{{ asset($category->image_path) }}" alt="" class="object-cover object-center absolute inset-0 h-full w-full">
					<div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-5 sm:absolute sm:inset-0"></div>
					<div class="relative flex w-full h-full flex-col items-start justify-start bg-black bg-opacity-25 transition-bg-opacity duration-150 ease-in-out group-hover:bg-opacity-40 p-9">
						<p class="mt-1 text-xl lg:text-3xl font-medium text-white">{{ $category->name }}</p>
					</div>
				</a>
			@empty
				<p class="text-sm text-gray-400">Nessuna categoria trovata.</p>
			@endforelse
		</div>
		<div>
			{{ $categories->links() }}
		</div>
	</div>
</div>
