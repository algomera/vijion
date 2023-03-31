@props(['href' => null])

@if($href)
	<a href="{{$href}}" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center space-x-2 rounded-md bg-brand-purple py-4 px-6 text-xs font-semibold text-white uppercase transition duration-300 hover:bg-brand-purple-light focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-purple disabled:cursor-not-allowed disabled:opacity-25']) }}>
		{{ $slot }}
	</a>
@else
	<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center space-x-2 rounded-md bg-brand-purple py-4 px-6 text-xs font-semibold text-white uppercase transition duration-300 hover:bg-brand-purple-light focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-purple disabled:cursor-not-allowed disabled:opacity-25']) }}>
		{{ $slot }}
	</button>
@endif
