@props(['category', 'brand', 'amount', 'coins'])
<div class="flex items-center space-x-5 py-5">
	<x-icon name="close"
	        class="w-6 h-6 text-gray-300 cursor-pointer flex-shrink-0 hover:text-gray-500"></x-icon>
	<div class="relative w-32 aspect-square">
		<img src="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"
		     alt="" class="aspect-square w-full object-cover">
	</div>
	<div class="flex flex-col space-y-3">
		<div>
			<h5 class="text-gray-900 font-semibold">{{ $category }}</h5>
			<span class="text-brand font-semibold text-sm">{{ $brand }}</span>
		</div>
		<div class="flex">
			<div class="flex flex-col justify-center bg-gray-50 border border-gray-100 h-16 px-8 py-1.5">
				<span class="leading-none text-2xl font-bold">{{ $amount }}</span>
				<span class="text-xs text-gray-500">(sconto)</span>
			</div>
			<div class="flex items-center space-x-1 bg-white text-brand border border-gray-100 border-l-0 h-16 p-3">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				     stroke="currentColor" class="w-6 h-6 flex-shrink-0">
					<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
					<path stroke-linecap="round" stroke-linejoin="round"
					      d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
				</svg>
				<span class="text-2xl font-black">{{ $coins }}</span>
			</div>
		</div>
	</div>
</div>