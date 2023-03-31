@props(['href' => null])

@if($href)
	<a href="{{$href}}" {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex justify-center items-center space-x-2 rounded-md bg-white py-4 px-6 text-xs font-semibold text-gray-700 uppercase transition duration-300 hover:bg-gray-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-100 disabled:cursor-not-allowed disabled:opacity-25']) }}>
		{{ $slot }}
	</a>
@else
	<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex justify-center items-center space-x-2 rounded-md bg-white py-4 px-6 text-xs font-semibold text-gray-700 uppercase transition duration-300 hover:bg-gray-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-100 disabled:cursor-not-allowed disabled:opacity-25']) }}>
		{{ $slot }}
	</button>
@endif
