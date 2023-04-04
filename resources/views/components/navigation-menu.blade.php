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
		<a href="#"
		   class="{{ request()->is('') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
			<x-heroicon-o-video-camera
					class="{{ request()->is('') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-video-camera>
			Video
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