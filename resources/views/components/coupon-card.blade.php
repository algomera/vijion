@props(['type', 'amount', 'brand', 'coins'])

<div class="flex flex-col w-full h-full border border-gray-200 rounded overflow-hidden transition ease-in-out duration-300 hover:cursor-pointer hover:border-transparent hover:shadow-[0_0_15px_#00000012] hover:shadow-gray-200">
	<div class="flex items-center justify-end bg-gray-50 text-sm px-3 mt-4 font-medium leading-8">
		<p>Sconto del <span class="text-lg font-bold text-brand">{{ $amount }}</span></p>
	</div>
	<div class="flex items-center flex-1 px-14">
		<img src="{{$brand['logo']}}" alt="{{ $brand['name'] }}" class="py-2 max-h-20 mx-auto">
	</div>
	<div class="flex items-center justify-between bg-white pb-4 px-3">
		<p class="text-sm text-gray-500">{{ $brand['category'] }}</p>
		<div class="flex items-center space-x-1 px-3 py-1 bg-brand text-white rounded">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
				<path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
			</svg>
			<span class="font-black">{{ $coins }}</span>
		</div>
	</div>
</div>