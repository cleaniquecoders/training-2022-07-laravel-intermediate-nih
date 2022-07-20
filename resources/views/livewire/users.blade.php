<div>
    <ol>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ol>
</div>
