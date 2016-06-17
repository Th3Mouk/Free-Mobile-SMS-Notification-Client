Free Mobile SMS Notifications Client
====================================

This library provides a client to send SMS notifications on your mobile phone, through the [Free Mobile](http://mobile
.free.fr/) API.

## Installation

`composer require th3mouk/free-mobile-sms-cli ^1.0@dev`

## Usage

### Client

```php
use Th3Mouk\FreeMobileSMSNotif\Client;

$login = 'test';
$pass = 'test';

$freeMobileClient = new Client($login, $pass);
$response = $freeMobileClient->sendMessage('Test Message');
```

### Response Codes

```php
$response = $freeMobileClient->sendMessage('Test Message');
$code = $response->getStatusCode();
```

- 200: SMS Sent
- 400: Missing parameter
- 402: Too much SMS send in too little time
- 403: Service isn't active on your customer area, or login/pass incorrect
- 500: Error on servor side. Please retry later.

## Please

Feel free to improve this bundle.
