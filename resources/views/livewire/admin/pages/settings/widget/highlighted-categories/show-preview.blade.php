<div class="p-4 grid grid-cols-2 gap-8">
	@if($category_1)
		<x-category-card :category="$category_1"/>
	@else
		<div class="group relative aspect-video bg-gray-300 col-span-2 sm:aspect-none sm:relative sm:h-full md:col-span-1"></div>
	@endif
	@if($category_2)
		<x-category-card :category="$category_2"/>
	@else
		<div class="group relative aspect-video bg-gray-300 col-span-2 sm:aspect-none sm:relative sm:h-full md:col-span-1"></div>
	@endif
	@if($category_3)
		<x-category-card-highlight :category="$category_3"/>
	@else
		<div class="group relative aspect-video bg-gray-300 col-span-2 sm:aspect-auto sm:relative sm:h-[300px] lg:h-[475px]"></div>
	@endif
</div>