@props(['subtitle', 'title', 'url'])

<div class="group relative aspect-video col-span-2 sm:aspect-auto sm:relative sm:h-[300px] lg:h-[475px]">
	<div class="relative flex w-full h-full flex-col items-start justify-start bg-[#e8a94a] p-9">
		<div class="relative ml-0 flex w-full h-full flex-col items-center justify-center px-6 text-center lg:px-0 lg:max-w-md lg:ml-14">
			<p class="mb-4 text-md text-white md:text-xl">{!! $subtitle !!}</p>
			<h1 class="text-3xl font-bold tracking-tight text-white md:text-6xl">{{ $title }}</h1>
			<a href="{{ $url }}" class="mt-8 rounded-md bg-brand-purple py-3 px-5 text-xs font-bold text-white uppercase hover:bg-brand-purple-light">Scopri di più</a>
		</div>
	</div>
</div>