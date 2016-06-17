Free Mobile SMS Notifications Client
====================================

This library provides a client to send SMS notifications on your mobile phone, through the [Free Mobile](http://mobile
.free.fr/) API.

[![Latest Stable Version](https://poser.pugx.org/th3mouk/free-mobile-sms-cli/v/stable)](https://packagist.org/packages/th3mouk/free-mobile-sms-cli) [![Latest Unstable Version](https://poser.pugx.org/th3mouk/free-mobile-sms-cli/v/unstable)](https://packagist.org/packages/th3mouk/free-mobile-sms-cli) [![Total Downloads](https://poser.pugx.org/th3mouk/free-mobile-sms-cli/downloads)](https://packagist.org/packages/th3mouk/free-mobile-sms-cli) [![License](https://poser.pugx.org/th3mouk/free-mobile-sms-cli/license)](https://packagist.org/packages/th3mouk/free-mobile-sms-cli)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8b929f44-e07d-4be1-9a62-cb8d0b3445c7/mini.png)](https://insight.sensiolabs.com/projects/8b929f44-e07d-4be1-9a62-cb8d0b3445c7) [![Build Status](https://travis-ci.org/Th3Mouk/Free-Mobile-SMS-Notification-Client.svg?branch=master)](https://travis-ci.org/Th3Mouk/Free-Mobile-SMS-Notification-Client) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Th3Mouk/Free-Mobile-SMS-Notification-Client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Th3Mouk/Free-Mobile-SMS-Notification-Client/?branch=master) [![Coverage Status](https://coveralls.io/repos/github/Th3Mouk/Free-Mobile-SMS-Notification-Client/badge.svg?branch=master)](https://coveralls.io/github/Th3Mouk/Free-Mobile-SMS-Notification-Client?branch=master)


## Installation

### Composer

`composer require th3mouk/free-mobile-sms-cli ^1.0@dev`

### Free Mobile

Go to your [customer area](https://mobile.free.fr/moncompte/).

Click on: Gérer mon compte > Mes Options > Notifications par SMS > Activer l'option

You got now your authentication key.

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
