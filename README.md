# OpenAPIClient-php

API для манипуляции с сущностями и создания отчетов в онлайн-сервисе МойСклад.

## Аутентификация

МойСклад поддерживает аутентификацию по протоколу Basic Auth и с использованием токена доступа:
- Basic Auth: заголовок `Authorization` со значением пары `логин:пароль`, закодированным в Base64
- Bearer Token: заголовок `Authorization` со значением `Bearer <Access-Token>`

## Ограничения

- Не более 45 запросов за 3 секундный период от аккаунта
- Не более 5 параллельных запросов от одного пользователя  
- Не более 20 параллельных запросов от аккаунта
- Не более 20 Мб данных в одном запросе
- Максимум 1000 элементов в массиве
- Обязательное использование сжатия gzip



## Installation & Usage

## Installation

PHP 7.4 and later.
Install [Composer](https://getcomposer.org/) and then run `composer install`

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure HTTP basic authorization: basicAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$entity_product_delete_post_request_inner = array(new \OpenAPI\Client\Model\EntityProductDeletePostRequestInner()); // \OpenAPI\Client\Model\EntityProductDeletePostRequestInner[]

try {
    $result = $apiInstance->entityProductDeletePost($entity_product_delete_post_request_inner);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->entityProductDeletePost: ', $e->getMessage(), PHP_EOL;
}

```

## Authorization

Authentication schemes defined for the API:
### basicAuth

- **Type**: HTTP basic authentication

### bearerAuth

- **Type**: Bearer authentication

## Tests

При запуске с IDE в Setting сконфигурировать:
Settings → PHP → Test Frameworks
Добавить новую конфигурацию для текущего проекта и указать
* Выбрать чекбокс "use composer autoload"
* Указать путь до файла autoload.php в проекте: /vendor/autoload.php
* Указать путь до файла конфигурации: /test/phpunit.xml
