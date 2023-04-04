<div>
	<x-slot:header>
		<h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
			Utenti
		</h2>
	</x-slot:header>
	<div class="bg-white">
		<div class="p-4 sm:p-6 lg:p-8">
			<div class="sm:flex sm:items-center sm:justify-between">
				<div class="sm:flex-auto max-w-2xl">
					<x-input type="text" wire:model.debouce.500ms="search" wire:keydown.escape="$set('search', '')"
					         placeholder="Cerca.."></x-input>
				</div>
			</div>
			<div class="-mx-4 mt-8 sm:-mx-0">
				<table class="min-w-full divide-y divide-gray-300">
					<thead>
					<tr>
						<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">
							Nome
						</th>
						<th scope="col"
						    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Email
						</th>
						<th scope="col"
						    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
							VIJI-COINS
						</th>
						<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ruolo</th>
						<th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
							<span class="sr-only">View</span>
						</th>
					</tr>
					</thead>
					<tbody class="divide-y divide-gray-200 bg-white">
					@forelse($users as $user)
						<tr wire:click="show({{$user->id}})" class="hover:bg-gray-50 hover:cursor-pointer">
							<td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-3">
								{{ $user->fullName }}
								<dl class="font-normal lg:hidden">
									<dt class="sr-only">Title</dt>
									<dd class="mt-1 truncate text-gray-700">{{ $user->email }}</dd>
									<dt class="sr-only sm:hidden">Email</dt>
									@if($user->hasRole('member'))
										<dd class="mt-1 truncate text-brand sm:hidden">
											<span class="font-semibold">{{ $user->coins }}</span> VIJI-COINS
										</dd>
									@endif
								</dl>
							</td>
							<td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->email }}</td>
							<td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
								{{ $user->coins ?? '-' }}
							</td>
							<td class="px-3 py-4 text-sm text-gray-500 capitalize">{{ $user->getRoleNames()->first() }}</td>
							<td class="px-3 py-4">
								<x-heroicon-o-chevron-right
										class="w-3 h-3 text-gray-400 ml-auto"></x-heroicon-o-chevron-right>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="100%"
							    class="w-full max-w-0 py-8 pl-4 pr-3 text-sm font-medium text-gray-400 text-center sm:w-auto sm:max-w-none sm:pl-3">
								Nessun utente trovato.
							</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="mt-5">
		{{ $users->links() }}
	</div>
</div>
