<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('general.Elimina l\'account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('general.testo_elimina_account') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('general.Elimina Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('general.Sei sicuro di voler eliminare definitivamente il tuo account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('general.Una volta che il tuo account è eliminato, tutte le risorse e i dati ad esso associati saranno eliminati definitivamente. Per favore inserisci la tua password per confermare di cancellare il tuo account definitivamente.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('general.Annulla') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('general.Elimina l\'account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
