<div>
    <form action="POST">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="feedback" value="{{ __('Feedback') }}" />
            <x-jet-input id="feedback" class="block mt-1 w-full" type="text" name="feedback" :value="old('feedback')" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                {{ __('Submit') }}
            </x-jet-button>
        </div>

    </form>
</div>
