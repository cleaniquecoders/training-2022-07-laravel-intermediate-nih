<div>
    @if(session()->has('message'))
        <div class="flex justify-end">
            <span class="text-black p-2 bg-green-200 rounded-md">{{ session('message') }}</span>
        </div>
    @endif
    <form wire:submit.prevent="save">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" 
                wire:model="name" required autofocus autocomplete="name" />
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" 
                wire:model="email" required />
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="feedback" value="{{ __('Feedback') }}" />
            <x-jet-input id="feedback" class="block mt-1 w-full" type="text" name="feedback" 
                wire:model="feedback" required />
            @error('feedback')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                {{ __('Submit') }}
            </x-jet-button>
        </div>

    </form>
</div>
