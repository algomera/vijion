<x-guest-layout>
    <div class="py-12 bg-gray-100">
        <div class="container">
            <h3 class="text-3xl font-bold mt-10 mb-12">Il tuo Profilo</h3>
            <div class="space-y-6">
                <div class="p-4 sm:p-8 bg-white">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                @if(auth()->user()->provider === null && auth()->user()->getAuthPassword() !== null)
                    <div class="p-4 sm:p-8 bg-white">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                @endif

                <div class="p-4 sm:p-8 bg-white">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
