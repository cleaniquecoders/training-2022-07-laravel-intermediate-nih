## Laravel Training Intermediate - NIH

### Event Service Provider

#### Generate Event & Listener

Add a listener in `EventServiceProvider.php`,

```php
<?php

namespace App\Providers;

use App\Listeners\SendNotificationToAdministrator;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendNotificationToAdministrator::class,
        ],
    ];
...
```

Then run in terminal:

```bash
$ php artisan event:generate
```

This will result creating new listener in `app/Listeners` directory.

Option 2:

Run the following command in terminal:

```bash
# The following will create an event as app/Events/SomeEvent.php
$ php artisan make:event SomeEvent
# The following will create an event as app/Listenerns/ListenToEvent.php
$ php artisan make:listener ListenToEvent --event=SomeEvent
```