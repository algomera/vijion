@props(['category', 'bg', 'url'])

<div class="group relative aspect-video col-span-2 sm:aspect-none sm:relative sm:h-full md:col-span-1">
	<img src="{{ $bg }}" alt="" class="object-cover object-center absolute inset-0 h-full w-full">
	<div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-5 sm:absolute sm:inset-0"></div>
	<div class="relative flex w-full h-full flex-col items-start justify-start bg-black bg-opacity-40 p-9">
		<p class="mt-1 text-xl lg:text-3xl font-medium text-white">{{ $category }}</p>
		<a href="{{ $url }}" class="mt-4 rounded-md bg-brand py-3 px-5 text-xs font-bold text-white uppercase hover:bg-brand-light">Scopri di più</a>
	</div>
</div>