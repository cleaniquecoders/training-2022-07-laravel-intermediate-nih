<div>
    <ol>
        @foreach ($users as $user)
            <li>
                {{ $user->name }}
                @if(empty($user->email_verified_at))
                    <button class="bg-indigo-500 " wire:click="markAsVerified('{{ $user->id }}')">
                        Mark as Verified
                    </button>
                @endif
            </li>
        @endforeach
    </ol>
</div>
