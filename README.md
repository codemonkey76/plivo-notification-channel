# Plivo notifications channel for Laravel

This package makes it easy to send SMS notifications using [Plivo](https://plivo.com) with Laravel 8.x.

This package is a copy of laravel-notification-channel/plivo as that package is currently broken for Laravel 8 and current version of plivo/plivo-php

## Contents

- [Installation](#installation)
    - [Setting up the Plivo service](#setting-up-the-Plivo-service)
- [Usage](#usage)
    - [Available Message methods](#available-message-methods)
- [Credits](#credits)
- [License](#license)


## Installation

Install the package via composer:
```bash
composer require codemonkey76/plivo-notification-channel
```


### Setting up your Plivo service
Log in to your [Plivo dashboard](https://manage.plivo.com/dashboard/) and grab your Auth Id, Auth Token and the phone number you're sending from. Add them to `config/services.php`.

```php
// config/services.php
...
'plivo' => [
    'auth_id' => env('PLIVO_AUTH_ID'),
    'auth_token' => env('PLIVO_AUTH_TOKEN'),
    // Country code, area code and number without symbols or spaces
    'from_number' => env('PLIVO_FROM_NUMBER'),
],
```

## Usage

Follow Laravel's documentation to add the channel your Notification class:

```php
use Illuminate\Notifications\Notification;
use Codemonkey76\Plivo\PlivoChannel;
use Codemonkey76\Plivo\PlivoMessage;

public function via($notifiable)
{
    return [PlivoChannel::class];
}

public function toPlivo($notifiable)
{
    return (new PlivoMessage)
                    ->content('This is a test SMS via Plivo using Laravel Notifications!');
}
```  

Add a `routeNotificationForPlivo` method to your Notifiable model to return the phone number:

```php
public function routeNotificationForPlivo()
{
    // Country code, area code and number without symbols or spaces
    return preg_replace('/\D+/', '', $this->phone_number);
}
```    

### Available methods

* `content()` - (string), SMS notification body
* `from()` - (integer) Override default from number

## Credits

- [Sid K](https://github.com/koomai)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
