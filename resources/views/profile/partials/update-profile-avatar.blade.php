<section>
    <header>
        <div class="flex justify-between">
            <div>
                <image src="{{ asset('storage/images/' . auth()->user()->avatar) }}" class="rounded-md h-[100px] w-[100px]"/>
            </div>
            <div>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Profile Avatar') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Update your account's profile avatar.") }}
                </p>
            </div>
        </div>
    </header>

    <form method="post" action="{{ route('profile.avatar.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
