<header x-data="{ show: false }" class="bg-white">
	<nav class="container flex items-center justify-between p-6 lg:px-8" aria-label="Global">
		<div class="flex flex-1 items-center gap-x-12">
			<a href="#" class="-m-1.5 p-1.5 flex-shrink-0">
				<span class="sr-only">{{ env('APP_NAME') }}</span>
				<img class="h-8 w-auto" src="{{ asset('/images/logo.png') }}" alt="">
			</a>
			<div class="hidden lg:flex lg:gap-x-12 w-full">
				<div class="flex items-center w-full max-w-sm">
					<div class="relative flex w-full">
						<input type="text" name="price" id="price"
						       class="block w-full rounded-l-full py-2.5 pr-7 pr-20 text-gray-900 border border-r-0 border-gray-200 placeholder:text-gray-400 focus:ring-0 focus:ring-transparent focus:border-gray-200 sm:text-sm sm:leading-6"
						       placeholder="Cerca su VIJI-STORE..">
						<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
							     stroke="currentColor" class="text-gray-700 w-4 h-4">
								<path stroke-linecap="round" stroke-linejoin="round"
								      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
							</svg>
						</div>
						<div class="absolute right-0 top-2.5 w-px h-7 bg-gray-200"></div>
					</div>
					<div x-data="{ open: false }" x-on:click="open = true" class="relative h-full rounded-r-full text-sm border border-l-0 border-gray-200 font-semibold text-gray-700 px-3">
						<div class="flex items-center space-x-2 h-full hover:text-brand hover:cursor-pointer" :class="{'text-brand': open}">
							<span>Categorie</span>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
							     stroke="currentColor" class="w-3 h-3">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
							</svg>
						</div>
						<!-- 'Categories' flyout menu, show/hide based on flyout menu state. -->
						<div x-cloak x-show="open"
						     x-transition:enter="transition ease-out duration-200"
						     x-transition:enter-start="opacity-0 translate-y-1"
						     x-transition:enter-end="opacity-100 translate-y-0"
						     x-transition:leave="transition ease-in duration-150"
						     x-transition:leave-start="opacity-100 translate-y-0"
						     x-transition:leave-end="opacity-0 translate-y-1"
						     x-on:click.away="open = false" class="absolute -translate-x-1/2 top-full z-10 mt-3 w-screen max-w-xl overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
							<div class="flex p-4 gap-x-20">
								<div class="w-1/2 space-y-1.5 divide-y">
									<h3 class="text-gray-400 text-xs uppercase font-light">Categorie</h3>
									<div class="space-y-4 pt-5">
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Marketplace
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Elettronica
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Abbigliamento e Scarpe
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Salute e Benessere
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Casa e Giardino
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Viaggi
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="flex items-center space-x-3 text-brand hover:text-brand">
													<span>Mostra tutte le categorie</span>
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 transform group-hover:translate-x-1 transition">
														<path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
													</svg>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="w-1/2 space-y-1.5 divide-y">
									<h3 class="text-gray-400 text-xs uppercase font-light">Brand</h3>
									<div class="space-y-4 pt-5">
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Brand 1
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Brand 2
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Brand 3
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Brand 4
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="block text-gray-600 hover:text-brand">
													Brand 5
												</a>
											</div>
										</div>
										<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
											<div class="flex-auto">
												<a href="#" class="flex items-center space-x-3 text-brand hover:text-brand">
													<span>Mostra tutti i brand</span>
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 transform group-hover:translate-x-1 transition">
														<path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
													</svg>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="flex lg:hidden">
			<button x-on:click="show = true" type="button"
			        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
				<span class="sr-only">Open main menu</span>
				<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
				     aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round"
					      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
				</svg>
			</button>
		</div>
		<div class="hidden lg:flex lg:items-center lg:space-x-3">
			<button class="flex items-center space-x-2">
				<span class="text-sm">Accedi</span>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				     stroke="currentColor" class="w-5 h-5">
					<path stroke-linecap="round" stroke-linejoin="round"
					      d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
				</svg>
			</button>
			<div class="w-px h-6 bg-gray-300"></div>
			<a href="#"
			   class="rounded-md bg-white mx-2 py-2.5 px-4 text-xs font-semibold text-brand uppercase ring-1 ring-inset ring-brand hover:bg-brand hover:text-white">Vai
				su Vijion</a>
		</div>
	</nav>
	<!-- Mobile menu, show/hide based on menu open state. -->
	<div x-cloak x-show="show" class="lg:hidden" role="dialog" aria-modal="true">
		<!-- Background backdrop, show/hide based on slide-over state. -->
		<div x-show="show" class="fixed inset-0 z-10"></div>
		<div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
			<div class="flex items-center justify-between">
				<a href="#" class="-m-1.5 p-1.5">
					<span class="sr-only">{{ env('APP_NAME') }}</span>
					<img class="h-8 w-auto" src="{{ asset('/images/logo.png') }}" alt="">
				</a>
				<button x-on:click="show = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
					<span class="sr-only">Close menu</span>
					<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
					     aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
					</svg>
				</button>
			</div>
			<div class="mt-6 flow-root">
				<div class="-my-6 divide-y divide-gray-500/10">
					<div class="space-y-2 py-6">
						<a href="#"
						   class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>

						<a href="#"
						   class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>

						<a href="#"
						   class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>

						<a href="#"
						   class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
					</div>
					<div class="py-6">
						<a href="#"
						   class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
							in</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>