<div class="py-8">
	<div class="flex items-center">
		<div class="min-w-0 flex-1">
			@isset($title)
				<h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
					{{ $title }}
				</h2>
			@endisset
			@isset($subtitle)
				<div class="mt-2 flex items-center text-sm text-gray-500">
					{{ $subtitle }}
				</div>
			@endisset
		</div>
		@isset($actions)
			{{ $actions }}
		@endisset
	</div>
</div>
