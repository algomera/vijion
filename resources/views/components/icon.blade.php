@switch($name)
	@case('home')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
				aria-hidden="true"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
			/>
		</svg>
		@break
	@case('clipboard-list')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
			/>
		</svg>
		@break
	@case('identification')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
			/>
		</svg>
		@break
	@case('users')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
			/>
		</svg>
		@break
	@case('bell')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
				aria-hidden="true"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
			/>
		</svg>
		@break
	@case('selector')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				viewBox="0 0 20 20"
				fill="currentColor"
		>
			<path
					fill-rule="evenodd"
					d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
					clip-rule="evenodd"
			/>
		</svg>
		@break
	@case('briefcase')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
			/>
		</svg>
		@break
	@case('calendar')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
			/>
		</svg>
		@break
	@case('chevron-right')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor" stroke-width="2">
			<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
		</svg>
		@break
	@case('chevron-left')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor" stroke-width="2">
			<path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
		</svg>
		@break
	@case('arrow-narrow-right')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M17 8l4 4m0 0l-4 4m4-4H3"
			/>
		</svg>
		@break
	@case('dots-vertical')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
			/>
		</svg>
		@break

	@case('plus')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				viewBox="0 0 20 20"
				fill="currentColor"
				aria-hidden="true"
		>
			<path
					fill-rule="evenodd"
					d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
					clip-rule="evenodd"
			/>
		</svg>
		@break

	@case('minus')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M20 12H4"
			/>
		</svg>
		@break

	@case('search')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
			/>
		</svg>
		@break

	@case('exclamation-circle')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
			/>
		</svg>
		@break

	@case('adjustments')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
			/>
		</svg>
		@break

	@case('menu-alt')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M4 6h16M4 12h8m-8 6h16"
			/>
		</svg>
		@break

	@case('menu')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M4 6h16M4 12h16M4 18h16"
			/>
		</svg>
		@break

	@case('close')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M6 18L18 6M6 6l12 12"
			/>
		</svg>
		@break

	@case('loading')
		<svg
				{{ $attributes->merge(['class' => 'animate-spin']) }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
		>
			<circle
					class="opacity-25"
					cx="12"
					cy="12"
					r="10"
					stroke="currentColor"
					stroke-width="4"
			></circle>
			<path
					class="opacity-75"
					fill="currentColor"
					d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
			></path>
		</svg>
		@break
	@case('arrow-left')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M7 16l-4-4m0 0l4-4m-4 4h18"
			/>
		</svg>
		@break
	@case('arrow-right')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="1.5"
					d="M17 8l4 4m0 0l-4 4m4-4H3"
			/>
		</svg>
		@break
	@case('arrow-down')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/>
		</svg>
		@break
	@case('folder')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
		</svg>
		@break
	@case('collection')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
		</svg>
		@break
	@case('lock-open')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
		</svg>
		@break
	@case('trash')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
		</svg>
		@break
	@case('pencil-alt')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
		</svg>
		@break
	@case('eye')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
		</svg>
		@break

	@case('eye-off')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
		</svg>
		@break
	@case('upload')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
		</svg>
		@break
	@case('download')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
		</svg>
		@break

	@case('refresh')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
		</svg>
		@break
	@case('location-marker')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
		</svg>
		@break

	@case('check')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
		</svg>
		@break

	@case('check-circle')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round"
			      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
		</svg>
		@break

	@case('document-text')
		<svg
				{{ $attributes }}
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
		</svg>
		@break

	@case('sparkles')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
		</svg>
		@break
	@case('copy')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
		</svg>
		@break
	@case('paste')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
		</svg>
		@break
	@case('chat')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
		</svg>
		@break
	@case('information-circle')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
		</svg>
		@break
	@case('star')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
		</svg>
		@break

	@case('cog')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
		</svg>
		@break

	@case('bookmark')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
		</svg>
		@break

	@case('paper-clip')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
		</svg>
		@break

	@case('paper-plane')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
		</svg>
		@break

	@case('clock')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
		</svg>
		@break

	@case('external-link')
		<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
		     stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
			      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
		</svg>
		@break

	@case('m²')
		<span class="text-sm text-gray-500">m²</span>
		@break
	@case('m³')
		<span class="text-sm text-gray-500">m³</span>
		@break
	@case('€')
		<span class="text-sm text-gray-500">€</span>
		@break
	@case('%')
		<span class="text-sm text-gray-500">%</span>
		@break
	@case('kW')
		<span class="text-sm text-gray-500">kW</span>
		@break
	@case('KWh')
		<span class="text-sm text-gray-500">KWh</span>
		@break
	@case('kWht')
		<span class="text-sm text-gray-500">kWht</span>
		@break
	@case('W/m²k')
		<span class="text-sm text-gray-500">W/m²k</span>
		@break
	@case('L')
		<span class="text-sm text-gray-500">L</span>
		@break
	@case('MJ')
		<span class="text-sm text-gray-500">MJ</span>
		@break
	@case('°C')
		<span class="text-sm text-gray-500">°C</span>
		@break
	@case('kWh/m²')
		<span class="text-sm text-gray-500">kWh/m²</span>
		@break
	@default

@endswitch
