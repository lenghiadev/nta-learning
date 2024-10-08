<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Upload avatar') }}
        </h2>
    </header>

    <form method="post" action="{{ route('avatar.upload') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <div class="image-prefix">
                @if(!empty($user->avatar))
                    <img src="{{ Storage::disk('s3')->url($user->avatar) }}" alt="" width="200px" height="200px">
                @endif
            </div>
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
