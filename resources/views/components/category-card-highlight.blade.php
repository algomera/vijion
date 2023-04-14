@props(['category'])

<div class="group relative aspect-video col-span-2 sm:aspect-auto sm:relative sm:h-[300px] lg:h-[475px]">
	<div class="relative flex w-full h-full flex-col items-start justify-start p-9">
		<img src="{{ asset($category->highlighted_background) }}" alt=""
		     class="object-cover object-center absolute inset-0 h-full w-full">
		<div class="relative ml-0 flex w-full h-full flex-col items-center justify-center px-6 text-center lg:px-0 lg:max-w-md lg:ml-14">
			<p class="mb-4 text-md text-white md:text-xl">{!! formatString($category->highlighted_subtitle) !!}</p>
			<h1 class="text-3xl font-bold tracking-tight text-white md:text-6xl">{!! formatString($category->highlighted_title) !!}</h1>
			<x-primary-button href="{{ route('category', $category->slug) }}" class="mt-8">Scopri di più</x-primary-button>
		</div>
	</div>
</div>