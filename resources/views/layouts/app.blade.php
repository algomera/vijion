<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- QuillJS -->
{{--        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
{{--        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}

        <!-- FlatPickr -->
{{--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/it.min.js"></script>--}}

        <!-- Select2 -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        @stack('styles')
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div x-cloak x-data="{ sidebarOpen: false }">
            <div x-show="sidebarOpen" class="relative z-40 xl:hidden" role="dialog" aria-modal="true">
                <!--
				  Entering: "transition-opacity ease-linear duration-300"
					From: "opacity-0"
					To: "opacity-100"
				  Leaving: "transition-opacity ease-linear duration-300"
					From: "opacity-100"
					To: "opacity-0"
				-->
                <div x-show="sidebarOpen" class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

                <div class="fixed inset-0 flex z-40">
                    <!--
					  Entering: "transition ease-in-out duration-300 transform"
						From: "-translate-x-full"
						To: "translate-x-0"
					  Leaving: "transition ease-in-out duration-300 transform"
						From: "translate-x-0"
						To: "-translate-x-full"
					-->
                    <div x-show="sidebarOpen" class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-800">
                        <!--
						  Close button, show/hide based on off-canvas menu state.

						  Entering: "ease-in-out duration-300"
							From: "opacity-0"
							To: "opacity-100"
						  Leaving: "ease-in-out duration-300"
							From: "opacity-100"
							To: "opacity-0"
						-->
                        <div x-show="sidebarOpen" x-on:click="sidebarOpen = false" class="absolute top-0 right-0 -mr-12 pt-2">
                            <button type="button"
                                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                <span class="sr-only">Close sidebar</span>
                                <!-- Heroicon name: outline/x -->
                                <x-heroicon-o-x-mark class="w-6 h-6 text-white"></x-heroicon-o-x-mark>
                            </button>
                        </div>

                        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('dashboard') }}" class="flex items-center flex-shrink-0 px-4">
                                    <img class="flex-shrink-0 h-auto w-36 invert" src="{{ asset('/images/logo.png') }}" alt="">
                                </a>
                            </div>
                            <x-navigation-menu />
                        </div>
                        <div class="flex-shrink-0 flex bg-gray-700 p-4">
                            <a href="{{ route('profile.edit') }}" class="flex-shrink-0 w-full group block">
                                <div class="flex items-center">
                                    <x-heroicon-o-user-circle class="w-7 h-7 text-gray-400"></x-heroicon-o-user-circle>
                                    <div class="ml-3 w-full flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-white">{{ auth()->user()->fullName }}</p>
                                            <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">Profilo</p>
                                        </div>
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <x-heroicon-o-arrow-left-on-rectangle @click.prevent="$root.submit();"
                                                                                  class="w-5 h-5 text-white"></x-heroicon-o-arrow-left-on-rectangle>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="flex-shrink-0 w-14">
                        <!-- Force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div x-data="{ open: $persist(true) }"
                 x-init="$watch('open', (val) => val)">
                <div :class="{'hidden xl:flex xl:fixed xl:inset-y-0' : open}" class="relative xl:w-64 xl:flex-col">
                    <div x-on:click="open = true"
                         x-show="!open"
                         class="absolute top-2.5">
                        <div class="text-white p-1 rounded-r cursor-pointer bg-gray-800 hover:bg-gray-700">
                            <x-icon name="heroicon-m-chevron-right" class="w-4 h-4"></x-icon>
                        </div>
                    </div>
                    <div x-show="open" class="flex-1 flex flex-col min-h-0 bg-gray-800">
                        <div class="flex-1 flex flex-col pt-2.5 pb-4 overflow-y-auto">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('dashboard') }}" class="flex items-center flex-shrink-0 px-4">
                                    <img class="flex-shrink-0 h-auto w-36 invert" src="{{ asset('/images/logo.png') }}" alt="">
                                </a>
                                <div x-on:click="open = false"
                                     class="text-white p-1 mr-2 rounded cursor-pointer hover:bg-gray-600">
                                    <template x-if="open">
                                        <x-icon name="heroicon-m-chevron-left" class="w-4 h-4"></x-icon>
                                    </template>
                                </div>
                            </div>
                            <x-navigation-menu />
                        </div>
                        <div class="flex-shrink-0 flex bg-gray-700 p-4">
                            <a href="{{ route('profile.edit') }}" class="flex-shrink-0 w-full group block">
                                <div class="flex items-center">
                                    <x-heroicon-o-user-circle class="w-7 h-7 text-gray-400"></x-heroicon-o-user-circle>
                                    <div class="ml-3 w-full flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-white">{{ auth()->user()->fullName }}</p>
                                            <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">Profilo</p>
                                        </div>
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <x-heroicon-o-arrow-left-on-rectangle @click.prevent="$root.submit();"
                                                                                  class="w-5 h-5 text-white"></x-heroicon-o-arrow-left-on-rectangle>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div :class="{'xl:pl-64' : open}" class="flex flex-col flex-1">
{{--                    <div class="block xl:hidden">--}}
{{--                        @livewire('offline-banner')--}}
{{--                    </div>--}}
                    <div class="sticky top-0 z-10 xl:hidden px-1 pt-1 sm:px-4 sm:pt-3 bg-white flex justify-between items-center">
                        <button x-on:click="sidebarOpen = true" type="button"
                                class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Open sidebar</span>
                            <!-- Heroicon name: outline/menu -->
                            <x-heroicon-o-bars-3 class="w-6 h-6"></x-heroicon-o-bars-3>
                        </button>
                        <x-top-bar />
                    </div>
                    <main class="flex-1">
                        {{-- Top Bar --}}
                        <div class="hidden xl:block">
{{--                            @livewire('offline-banner')--}}
                            <x-top-bar />
                        </div>
                        {{-- Breadcrumbs --}}
                        {{--			<div class="py-2 px-4 sm:px-6 lg:px-8 bg-gray-700 text-sm">--}}
                        {{--				<nav class="flex" aria-label="Breadcrumb">--}}
                        {{--					<ol role="list" class="flex items-center">--}}
                        {{--						<li>--}}
                        {{--							<div class="flex items-center">--}}
                        {{--								<p class="text-sm font-medium text-white" aria-current="page">Dashboard</p>--}}
                        {{--							</div>--}}
                        {{--						</li>--}}

                        {{--						<li>--}}
                        {{--							<div class="flex items-center">--}}
                        {{--								<span class="mx-1.5 text-white/40">/</span>--}}
                        {{--								<p class="text-sm font-medium text-white" aria-current="page">Pagina 1</p>--}}
                        {{--							</div>--}}
                        {{--						</li>--}}
                        {{--					</ol>--}}
                        {{--				</nav>--}}
                        {{--			</div>--}}
                        <div>
                            <!-- Page Heading -->
                            @if (isset($header))
                                <div class="px-4 py-8">
                                    <h1 class="text-2xl font-semibold text-gray-900">{{ $header }}</h1>
                                </div>
                            @endif
                            <div class="px-4 pb-6 {{ !isset($header) ? 'pt-4' : '' }}">
                                <div>
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <x-notification></x-notification>
        @stack('scripts')
        @livewireScripts
        @livewire('livewire-ui-modal')
    </body>
</html>
