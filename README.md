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

### Requirements

PHP 7.4 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

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

## API Endpoints

All URIs are relative to *https://api.moysklad.ru/api/remap/1.2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ProductsApi* | [**entityProductDeletePost**](docs/Api/ProductsApi.md#entityproductdeletepost) | **POST** /entity/product/delete | Массовое удаление товаров
*ProductsApi* | [**entityProductGet**](docs/Api/ProductsApi.md#entityproductget) | **GET** /entity/product | Получить список товаров
*ProductsApi* | [**entityProductIdDelete**](docs/Api/ProductsApi.md#entityproductiddelete) | **DELETE** /entity/product/{id} | Удалить товар
*ProductsApi* | [**entityProductIdGet**](docs/Api/ProductsApi.md#entityproductidget) | **GET** /entity/product/{id} | Получить товар по ID
*ProductsApi* | [**entityProductIdPut**](docs/Api/ProductsApi.md#entityproductidput) | **PUT** /entity/product/{id} | Обновить товар
*ProductsApi* | [**entityProductMetadataGet**](docs/Api/ProductsApi.md#entityproductmetadataget) | **GET** /entity/product/metadata | Получить метаданные товаров
*ProductsApi* | [**entityProductPost**](docs/Api/ProductsApi.md#entityproductpost) | **POST** /entity/product | Создать товар

## Models

- [Accounts](docs/Model/Accounts.md)
- [AddressFull](docs/Model/AddressFull.md)
- [AddressFullRegion](docs/Model/AddressFullRegion.md)
- [Attribute](docs/Model/Attribute.md)
- [Cashier](docs/Model/Cashier.md)
- [CashierEmployee](docs/Model/CashierEmployee.md)
- [CashierRetailStore](docs/Model/CashierRetailStore.md)
- [ChequePrinter](docs/Model/ChequePrinter.md)
- [Contactpersons](docs/Model/Contactpersons.md)
- [ContactpersonsAgent](docs/Model/ContactpersonsAgent.md)
- [Counterparty](docs/Model/Counterparty.md)
- [CounterpartyAccounts](docs/Model/CounterpartyAccounts.md)
- [CounterpartyContactpersons](docs/Model/CounterpartyContactpersons.md)
- [CounterpartyGroup](docs/Model/CounterpartyGroup.md)
- [CounterpartyOwner](docs/Model/CounterpartyOwner.md)
- [Country](docs/Model/Country.md)
- [Currency](docs/Model/Currency.md)
- [CurrencyMajorUnit](docs/Model/CurrencyMajorUnit.md)
- [CurrencyMinorUnit](docs/Model/CurrencyMinorUnit.md)
- [Driver](docs/Model/Driver.md)
- [Employee](docs/Model/Employee.md)
- [EmployeeCashiersInner](docs/Model/EmployeeCashiersInner.md)
- [EmployeeSalary](docs/Model/EmployeeSalary.md)
- [EntityProductDeletePost200ResponseInner](docs/Model/EntityProductDeletePost200ResponseInner.md)
- [EntityProductDeletePostRequestInner](docs/Model/EntityProductDeletePostRequestInner.md)
- [EntityProductPost200Response](docs/Model/EntityProductPost200Response.md)
- [EntityProductPostRequest](docs/Model/EntityProductPostRequest.md)
- [Environment](docs/Model/Environment.md)
- [Error](docs/Model/Error.md)
- [ErrorErrorsInner](docs/Model/ErrorErrorsInner.md)
- [File](docs/Model/File.md)
- [FiscalError](docs/Model/FiscalError.md)
- [FiscalMemory](docs/Model/FiscalMemory.md)
- [FiscalStatusMemory](docs/Model/FiscalStatusMemory.md)
- [FiscalType](docs/Model/FiscalType.md)
- [Group](docs/Model/Group.md)
- [Image](docs/Model/Image.md)
- [LastOperationNames](docs/Model/LastOperationNames.md)
- [MarkingSellingMode](docs/Model/MarkingSellingMode.md)
- [MarksCheckMode](docs/Model/MarksCheckMode.md)
- [Meta](docs/Model/Meta.md)
- [MetaList](docs/Model/MetaList.md)
- [MinionToMasterType](docs/Model/MinionToMasterType.md)
- [PaymentTerminal](docs/Model/PaymentTerminal.md)
- [PriceType](docs/Model/PriceType.md)
- [PriorityOfdSend](docs/Model/PriorityOfdSend.md)
- [Product](docs/Model/Product.md)
- [ProductAlcoholic](docs/Model/ProductAlcoholic.md)
- [ProductBarcodesInner](docs/Model/ProductBarcodesInner.md)
- [ProductBuyPrice](docs/Model/ProductBuyPrice.md)
- [ProductBuyPriceCurrency](docs/Model/ProductBuyPriceCurrency.md)
- [ProductCountry](docs/Model/ProductCountry.md)
- [ProductFiles](docs/Model/ProductFiles.md)
- [ProductFilesRowsInner](docs/Model/ProductFilesRowsInner.md)
- [ProductFolder](docs/Model/ProductFolder.md)
- [ProductFolderGroup](docs/Model/ProductFolderGroup.md)
- [ProductFolderOwner](docs/Model/ProductFolderOwner.md)
- [ProductFolderProductFolder](docs/Model/ProductFolderProductFolder.md)
- [ProductImages](docs/Model/ProductImages.md)
- [ProductImagesRowsInner](docs/Model/ProductImagesRowsInner.md)
- [ProductList](docs/Model/ProductList.md)
- [ProductListContext](docs/Model/ProductListContext.md)
- [ProductListContextEmployee](docs/Model/ProductListContextEmployee.md)
- [ProductMetadata](docs/Model/ProductMetadata.md)
- [ProductMinPrice](docs/Model/ProductMinPrice.md)
- [ProductMinimumStock](docs/Model/ProductMinimumStock.md)
- [ProductMinimumStockStoreBalances](docs/Model/ProductMinimumStockStoreBalances.md)
- [ProductPacksInner](docs/Model/ProductPacksInner.md)
- [ProductProductFolder](docs/Model/ProductProductFolder.md)
- [ProductSalePricesInner](docs/Model/ProductSalePricesInner.md)
- [ProductSalePricesInnerPriceType](docs/Model/ProductSalePricesInnerPriceType.md)
- [ProductSupplier](docs/Model/ProductSupplier.md)
- [ProductUom](docs/Model/ProductUom.md)
- [RetailStore](docs/Model/RetailStore.md)
- [RetailStoreAcquire](docs/Model/RetailStoreAcquire.md)
- [RetailStoreCashiers](docs/Model/RetailStoreCashiers.md)
- [RetailStoreCreateOrderWithState](docs/Model/RetailStoreCreateOrderWithState.md)
- [RetailStoreGroup](docs/Model/RetailStoreGroup.md)
- [RetailStoreOrderToState](docs/Model/RetailStoreOrderToState.md)
- [RetailStoreOrganization](docs/Model/RetailStoreOrganization.md)
- [RetailStoreOwner](docs/Model/RetailStoreOwner.md)
- [RetailStoreQrAcquire](docs/Model/RetailStoreQrAcquire.md)
- [RetailStoreReceiptTemplate](docs/Model/RetailStoreReceiptTemplate.md)
- [RetailStoreStore](docs/Model/RetailStoreStore.md)
- [Software](docs/Model/Software.md)
- [Status](docs/Model/Status.md)
- [Store](docs/Model/Store.md)
- [StoreBalance](docs/Model/StoreBalance.md)
- [StoreBalanceStore](docs/Model/StoreBalanceStore.md)
- [StoreGroup](docs/Model/StoreGroup.md)
- [StoreOwner](docs/Model/StoreOwner.md)
- [StoreParent](docs/Model/StoreParent.md)
- [StoreSlots](docs/Model/StoreSlots.md)
- [StoreZones](docs/Model/StoreZones.md)
- [Sync](docs/Model/Sync.md)
- [TaxSystem](docs/Model/TaxSystem.md)
- [TobaccoMrcControlType](docs/Model/TobaccoMrcControlType.md)
- [Uom](docs/Model/Uom.md)

## Authorization

Authentication schemes defined for the API:
### basicAuth

- **Type**: HTTP basic authentication

### bearerAuth

- **Type**: Bearer authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Generator version: `7.14.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
