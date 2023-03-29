@props(['name'])
<div {{ $attributes->merge(['class' => "swiper $name"]) }}>
	<div class="swiper-wrapper">
		{{ $slot }}
	</div>
	@isset($pagination)
		{{ $pagination }}
	@endisset
</div>