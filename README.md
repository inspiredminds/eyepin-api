[![](https://img.shields.io/packagist/v/inspiredminds/eyepin-api.svg)](https://packagist.org/packages/inspiredminds/eyepin-api)
[![](https://img.shields.io/packagist/dt/inspiredminds/eyepin-api.svg)](https://packagist.org/packages/inspiredminds/eyepin-api)

eyepin API
==========

PHP library for the [eyepin](https://www.eyepin.com/) [API](https://docs.eyepin.com/api/).

```php
use InspiredMinds\EyepinApi\EyepinApiFactory;
use InspiredMinds\EyepinApi\Model\AddressList;
use InspiredMinds\EyepinApi\Model\Request\AddressInsertRequest;

$api = (new EyepinApiFactory())->createForCredentials('username', 'password');

// Get account info
$accountInfo = $api->getAccountInfo();

// Create address
$addressInsertRequest = new AddressInsertRequest();
$addressInsertRequest->email = 'foobar@example.com';
$addressInsertRequest->status = '1';
$addressInsertRequest->lists[] = new AddressList(123);

$api->createUpdateAddress($addressInsertRequest);
```