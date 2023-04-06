<nav class="mt-5 px-2 h-[calc(100vh-156px)] flex flex-col justify-between">
	<div class="space-y-1">
		<a href="{{ route('dashboard') }}"
		   class="{{ request()->is('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
			<x-heroicon-o-home
					class="{{ request()->is('dashboard') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-home>
			Dashboard
		</a>
		<h3 class="!mt-3 px-3 text-sm font-medium text-gray-500">Viji-Store</h3>
		<a href="{{ route('brands.index') }}"
		   class="{{ request()->is('brands*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
			<x-heroicon-o-building-storefront
					class="{{ request()->is('brands*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-building-storefront>
			Brands
		</a>
		<a href="{{ route('categories.index') }}"
		   class="{{ request()->is('categories*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
			<x-heroicon-o-archive-box
					class="{{ request()->is('categories*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-archive-box>
			Categorie
		</a>
		<a href="{{ route('users.index') }}"
		   class="{{ request()->is('users*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
			<x-heroicon-o-users
					class="{{ request()->is('users*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-users>
			Utenti
		</a>
		<h3 class="!mt-3 px-3 text-sm font-medium text-gray-500">Vijion</h3>
		<a href="{{ route('videos.index') }}"
		   class="{{ request()->is('videos*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
			<x-heroicon-o-video-camera
					class="{{ request()->is('videos*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-video-camera>
			Video
		</a>
		<h3 class="!mt-3 px-3 text-sm font-medium text-gray-500">Impostazioni</h3>
		<a href="{{ route('settings.homepage') }}"
		   class="{{ request()->is('settings*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
			<svg xmlns="http://www.w3.org/2000/svg"
			     class="{{ request()->is('settings*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"
			     width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
			     stroke-linecap="round" stroke-linejoin="round">
				<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
				<path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
				<path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
				<path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
				<path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
			</svg>
			Homepage
		</a>
		{{--		<div class="ml-5">--}}
		{{--			<a href="#"--}}
		{{--			   class="{{ request()->is('') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">--}}
		{{--				<x-heroicon-o-archive-box--}}
		{{--						class="{{ request()->is('') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-archive-box>--}}
		{{--				Item--}}
		{{--			</a>--}}
		{{--		</div>--}}
	</div>
{{--	<div>--}}
{{--		<a href="#"--}}
{{--		   class="{{ request()->is('') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">--}}
{{--			<x-heroicon-o-wrench-screwdriver--}}
{{--					class="{{ request()->is('') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-wrench-screwdriver>--}}
{{--			Impostazioni Avanzate--}}
{{--		</a>--}}
{{--	</div>--}}
</nav>