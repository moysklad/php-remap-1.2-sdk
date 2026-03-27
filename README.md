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

PHP 8.1 and later.

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


$apiInstance = new OpenAPI\Client\Api\CounterpartiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 12a8b923-692c-11e6-8a84-bae500000053; // string | ID сущности
$file_upload = [{filename=doc.pdf, content=SGVsbG8gV29ybGQ=}]; // \OpenAPI\Client\Model\FileUpload[]
$accept = 'application/json;charset=utf-8'; // string
$accept_encoding = gzip, deflate, br; // string
$content_type = 'application/json'; // string

try {
    $result = $apiInstance->addCounterpartyFiles($id, $file_upload, $accept, $accept_encoding, $content_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CounterpartiesApi->addCounterpartyFiles: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.moysklad.ru/api/remap/1.2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CounterpartiesApi* | [**addCounterpartyFiles**](docs/Api/CounterpartiesApi.md#addcounterpartyfiles) | **POST** /entity/counterparty/{id}/files | Добавить файлы к контрагенту
*CounterpartiesApi* | [**createCounterpartiesBatch**](docs/Api/CounterpartiesApi.md#createcounterpartiesbatch) | **POST** /entity/counterparty/batch | Создать или изменить контрагентов
*CounterpartiesApi* | [**createCounterparty**](docs/Api/CounterpartiesApi.md#createcounterparty) | **POST** /entity/counterparty | Создать контрагента
*CounterpartiesApi* | [**createCounterpartyAccount**](docs/Api/CounterpartiesApi.md#createcounterpartyaccount) | **POST** /entity/counterparty/{id}/accounts | Создать счёт контрагента
*CounterpartiesApi* | [**createCounterpartyContactPerson**](docs/Api/CounterpartiesApi.md#createcounterpartycontactperson) | **POST** /entity/counterparty/{id}/contactpersons | Создать контактное лицо контрагента
*CounterpartiesApi* | [**createCounterpartyNote**](docs/Api/CounterpartiesApi.md#createcounterpartynote) | **POST** /entity/counterparty/{id}/notes | Создать событие контрагента
*CounterpartiesApi* | [**deleteCounterpartiesBatch**](docs/Api/CounterpartiesApi.md#deletecounterpartiesbatch) | **POST** /entity/counterparty/delete | Удалить контрагентов
*CounterpartiesApi* | [**deleteCounterparty**](docs/Api/CounterpartiesApi.md#deletecounterparty) | **DELETE** /entity/counterparty/{id} | Удалить контрагента
*CounterpartiesApi* | [**deleteCounterpartyAccount**](docs/Api/CounterpartiesApi.md#deletecounterpartyaccount) | **DELETE** /entity/counterparty/{id}/accounts/{accountId} | Удалить счёт контрагента
*CounterpartiesApi* | [**deleteCounterpartyContactPerson**](docs/Api/CounterpartiesApi.md#deletecounterpartycontactperson) | **DELETE** /entity/counterparty/{id}/contactpersons/{contactPersonId} | Удалить контактное лицо контрагента
*CounterpartiesApi* | [**deleteCounterpartyFile**](docs/Api/CounterpartiesApi.md#deletecounterpartyfile) | **DELETE** /entity/counterparty/{id}/files/{fileId} | Удалить файл контрагента
*CounterpartiesApi* | [**deleteCounterpartyNote**](docs/Api/CounterpartiesApi.md#deletecounterpartynote) | **DELETE** /entity/counterparty/{id}/notes/{noteId} | Удалить событие контрагента
*CounterpartiesApi* | [**getCounterparties**](docs/Api/CounterpartiesApi.md#getcounterparties) | **GET** /entity/counterparty | Получить список контрагентов
*CounterpartiesApi* | [**getCounterpartyAccountById**](docs/Api/CounterpartiesApi.md#getcounterpartyaccountbyid) | **GET** /entity/counterparty/{id}/accounts/{accountId} | Получить счёт контрагента по ID
*CounterpartiesApi* | [**getCounterpartyAccounts**](docs/Api/CounterpartiesApi.md#getcounterpartyaccounts) | **GET** /entity/counterparty/{id}/accounts | Получить счета контрагента
*CounterpartiesApi* | [**getCounterpartyById**](docs/Api/CounterpartiesApi.md#getcounterpartybyid) | **GET** /entity/counterparty/{id} | Получить контрагента по ID
*CounterpartiesApi* | [**getCounterpartyContactPersonById**](docs/Api/CounterpartiesApi.md#getcounterpartycontactpersonbyid) | **GET** /entity/counterparty/{id}/contactpersons/{contactPersonId} | Получить контактное лицо контрагента по ID
*CounterpartiesApi* | [**getCounterpartyContactPersons**](docs/Api/CounterpartiesApi.md#getcounterpartycontactpersons) | **GET** /entity/counterparty/{id}/contactpersons | Получить контактные лица контрагента
*CounterpartiesApi* | [**getCounterpartyFiles**](docs/Api/CounterpartiesApi.md#getcounterpartyfiles) | **GET** /entity/counterparty/{id}/files | Получить файлы контрагента
*CounterpartiesApi* | [**getCounterpartyMetadata**](docs/Api/CounterpartiesApi.md#getcounterpartymetadata) | **GET** /entity/counterparty/metadata | Получить метаданные контрагентов
*CounterpartiesApi* | [**getCounterpartyNoteById**](docs/Api/CounterpartiesApi.md#getcounterpartynotebyid) | **GET** /entity/counterparty/{id}/notes/{noteId} | Получить событие контрагента по ID
*CounterpartiesApi* | [**getCounterpartyNotes**](docs/Api/CounterpartiesApi.md#getcounterpartynotes) | **GET** /entity/counterparty/{id}/notes | Получить события контрагента
*CounterpartiesApi* | [**updateCounterparty**](docs/Api/CounterpartiesApi.md#updatecounterparty) | **PUT** /entity/counterparty/{id} | Обновить контрагента
*CounterpartiesApi* | [**updateCounterpartyAccount**](docs/Api/CounterpartiesApi.md#updatecounterpartyaccount) | **PUT** /entity/counterparty/{id}/accounts/{accountId} | Обновить счёт контрагента
*CounterpartiesApi* | [**updateCounterpartyContactPerson**](docs/Api/CounterpartiesApi.md#updatecounterpartycontactperson) | **PUT** /entity/counterparty/{id}/contactpersons/{contactPersonId} | Обновить контактное лицо контрагента
*CounterpartiesApi* | [**updateCounterpartyNote**](docs/Api/CounterpartiesApi.md#updatecounterpartynote) | **PUT** /entity/counterparty/{id}/notes/{noteId} | Обновить событие контрагента
*CountriesApi* | [**createCountriesBatch**](docs/Api/CountriesApi.md#createcountriesbatch) | **POST** /entity/country/batch | Создать или изменить страны
*CountriesApi* | [**createCountry**](docs/Api/CountriesApi.md#createcountry) | **POST** /entity/country | Создать страну
*CountriesApi* | [**deleteCountriesBatch**](docs/Api/CountriesApi.md#deletecountriesbatch) | **POST** /entity/country/delete | Удалить страны
*CountriesApi* | [**deleteCountry**](docs/Api/CountriesApi.md#deletecountry) | **DELETE** /entity/country/{id} | Удалить страну
*CountriesApi* | [**getCountries**](docs/Api/CountriesApi.md#getcountries) | **GET** /entity/country | Получить список стран
*CountriesApi* | [**getCountryById**](docs/Api/CountriesApi.md#getcountrybyid) | **GET** /entity/country/{id} | Получить страну по id
*CountriesApi* | [**updateCountry**](docs/Api/CountriesApi.md#updatecountry) | **PUT** /entity/country/{id} | Обновить страну
*CurrenciesApi* | [**createCurrenciesBatch**](docs/Api/CurrenciesApi.md#createcurrenciesbatch) | **POST** /entity/currency/batch | Создать или изменить валюту
*CurrenciesApi* | [**createCurrency**](docs/Api/CurrenciesApi.md#createcurrency) | **POST** /entity/currency | Создать валюту
*CurrenciesApi* | [**deleteCurrenciesBatch**](docs/Api/CurrenciesApi.md#deletecurrenciesbatch) | **POST** /entity/currency/delete | Удалить валюту
*CurrenciesApi* | [**deleteCurrency**](docs/Api/CurrenciesApi.md#deletecurrency) | **DELETE** /entity/currency/{id} | Удалить валюту
*CurrenciesApi* | [**getCurrencies**](docs/Api/CurrenciesApi.md#getcurrencies) | **GET** /entity/currency | Получить список валют
*CurrenciesApi* | [**getCurrencyById**](docs/Api/CurrenciesApi.md#getcurrencybyid) | **GET** /entity/currency/{id} | Получить валюту по ID
*CurrenciesApi* | [**updateCurrency**](docs/Api/CurrenciesApi.md#updatecurrency) | **PUT** /entity/currency/{id} | Обновить валюту
*EmployeesApi* | [**activateEmployee**](docs/Api/EmployeesApi.md#activateemployee) | **PUT** /entity/employee/{id}/access/activate | Активировать сотрудника
*EmployeesApi* | [**createEmployee**](docs/Api/EmployeesApi.md#createemployee) | **POST** /entity/employee | Создать сотрудника
*EmployeesApi* | [**createEmployeesBatch**](docs/Api/EmployeesApi.md#createemployeesbatch) | **POST** /entity/employee/batch | Создать или изменить сотрудников
*EmployeesApi* | [**deactivateEmployee**](docs/Api/EmployeesApi.md#deactivateemployee) | **PUT** /entity/employee/{id}/access/deactivate | Деактивировать сотрудника
*EmployeesApi* | [**deleteEmployee**](docs/Api/EmployeesApi.md#deleteemployee) | **DELETE** /entity/employee/{id} | Удалить сотрудника
*EmployeesApi* | [**deleteEmployeesBatch**](docs/Api/EmployeesApi.md#deleteemployeesbatch) | **POST** /entity/employee/delete | Удалить сотрудников
*EmployeesApi* | [**getEmployeeById**](docs/Api/EmployeesApi.md#getemployeebyid) | **GET** /entity/employee/{id} | Получить сотрудника по ID
*EmployeesApi* | [**getEmployeeMetadata**](docs/Api/EmployeesApi.md#getemployeemetadata) | **GET** /entity/employee/metadata | Получить метаданные товаров
*EmployeesApi* | [**getEmployeeSecurity**](docs/Api/EmployeesApi.md#getemployeesecurity) | **GET** /entity/employee/{id}/security | Получить права сотрудника
*EmployeesApi* | [**getEmployees**](docs/Api/EmployeesApi.md#getemployees) | **GET** /entity/employee | Получить список сотрудников
*EmployeesApi* | [**getRoleAdmin**](docs/Api/EmployeesApi.md#getroleadmin) | **GET** /entity/role/admin | Получить роль администратора
*EmployeesApi* | [**getRoleCashier**](docs/Api/EmployeesApi.md#getrolecashier) | **GET** /entity/role/cashier | Получить роль кассира
*EmployeesApi* | [**getRoleIndividual**](docs/Api/EmployeesApi.md#getroleindividual) | **GET** /entity/role/individual | Получить индивидуальную роль
*EmployeesApi* | [**getRoleOwner**](docs/Api/EmployeesApi.md#getroleowner) | **GET** /entity/role/owner | Получить роль владельца аккаунта
*EmployeesApi* | [**getRoleWorker**](docs/Api/EmployeesApi.md#getroleworker) | **GET** /entity/role/worker | Получить роль сотрудника производства
*EmployeesApi* | [**resetEmployeePassword**](docs/Api/EmployeesApi.md#resetemployeepassword) | **PUT** /entity/employee/{id}/access/resetpassword | Сбросить пароль сотрудника
*EmployeesApi* | [**updateEmployee**](docs/Api/EmployeesApi.md#updateemployee) | **PUT** /entity/employee/{id} | Обновить сотрудника
*EmployeesApi* | [**updateEmployeeSecurity**](docs/Api/EmployeesApi.md#updateemployeesecurity) | **PUT** /entity/employee/{id}/security | Изменить права сотрудника
*GroupsApi* | [**createGroup**](docs/Api/GroupsApi.md#creategroup) | **POST** /entity/group | Создать группу
*GroupsApi* | [**deleteGroup**](docs/Api/GroupsApi.md#deletegroup) | **DELETE** /entity/group/{id} | Удалить группу
*GroupsApi* | [**getGroupById**](docs/Api/GroupsApi.md#getgroupbyid) | **GET** /entity/group/{id} | Получить группу по ID
*GroupsApi* | [**getGroups**](docs/Api/GroupsApi.md#getgroups) | **GET** /entity/group | Получить список групп
*GroupsApi* | [**updateGroup**](docs/Api/GroupsApi.md#updategroup) | **PUT** /entity/group/{id} | Обновить группу
*PriceTypesApi* | [**createPriceTypesBatch**](docs/Api/PriceTypesApi.md#createpricetypesbatch) | **POST** /context/companysettings/pricetype | Создать или изменить типы цен
*PriceTypesApi* | [**getDefaultPriceType**](docs/Api/PriceTypesApi.md#getdefaultpricetype) | **GET** /context/companysettings/pricetype/default | Получить тип цены по умолчанию
*PriceTypesApi* | [**getPriceTypeById**](docs/Api/PriceTypesApi.md#getpricetypebyid) | **GET** /context/companysettings/pricetype/{id} | Получить тип цены по ID
*PriceTypesApi* | [**getPriceTypes**](docs/Api/PriceTypesApi.md#getpricetypes) | **GET** /context/companysettings/pricetype | Получить список типов цен
*ProductFoldersApi* | [**createProductFolder**](docs/Api/ProductFoldersApi.md#createproductfolder) | **POST** /entity/productfolder | Создать группу товаров
*ProductFoldersApi* | [**createProductFoldersBatch**](docs/Api/ProductFoldersApi.md#createproductfoldersbatch) | **POST** /entity/productfolder/batch | Создать или изменить группы товаров
*ProductFoldersApi* | [**deleteProductFolder**](docs/Api/ProductFoldersApi.md#deleteproductfolder) | **DELETE** /entity/productfolder/{id} | Удалить группу товаров
*ProductFoldersApi* | [**deleteProductFoldersBatch**](docs/Api/ProductFoldersApi.md#deleteproductfoldersbatch) | **POST** /entity/productfolder/delete | Удалить группы товаров
*ProductFoldersApi* | [**getProductFolderById**](docs/Api/ProductFoldersApi.md#getproductfolderbyid) | **GET** /entity/productfolder/{id} | Получить группу товаров по ID
*ProductFoldersApi* | [**getProductFolders**](docs/Api/ProductFoldersApi.md#getproductfolders) | **GET** /entity/productfolder | Получить список групп товаров
*ProductFoldersApi* | [**updateProductFolder**](docs/Api/ProductFoldersApi.md#updateproductfolder) | **PUT** /entity/productfolder/{id} | Обновить группу товаров
*ProductsApi* | [**addProductFiles**](docs/Api/ProductsApi.md#addproductfiles) | **POST** /entity/product/{id}/files | Добавить файлы к товару
*ProductsApi* | [**addProductImages**](docs/Api/ProductsApi.md#addproductimages) | **POST** /entity/product/{id}/images | Добавить изображения к товару
*ProductsApi* | [**createProduct**](docs/Api/ProductsApi.md#createproduct) | **POST** /entity/product | Создать товар
*ProductsApi* | [**createProductStoreBalance**](docs/Api/ProductsApi.md#createproductstorebalance) | **POST** /entity/product/{id}/storebalances | Создать НСО товара для склада
*ProductsApi* | [**createProductsBatch**](docs/Api/ProductsApi.md#createproductsbatch) | **POST** /entity/product/batch | Создать или изменить товары
*ProductsApi* | [**deleteProduct**](docs/Api/ProductsApi.md#deleteproduct) | **DELETE** /entity/product/{id} | Удалить товар
*ProductsApi* | [**deleteProductFile**](docs/Api/ProductsApi.md#deleteproductfile) | **DELETE** /entity/product/{id}/files/{fileId} | Удалить файл товара
*ProductsApi* | [**deleteProductImage**](docs/Api/ProductsApi.md#deleteproductimage) | **DELETE** /entity/product/{id}/images/{imageId} | Удалить изображение товара
*ProductsApi* | [**deleteProductImages**](docs/Api/ProductsApi.md#deleteproductimages) | **POST** /entity/product/{id}/images/delete | Массовое удаление изображений товара
*ProductsApi* | [**deleteProductStoreBalance**](docs/Api/ProductsApi.md#deleteproductstorebalance) | **DELETE** /entity/product/{id}/storebalances/{storeBalanceId} | Удалить НСО товара по складу
*ProductsApi* | [**deleteProductStoreBalances**](docs/Api/ProductsApi.md#deleteproductstorebalances) | **POST** /entity/product/{id}/storebalances/delete | Массовое удаление НСО товара по складам
*ProductsApi* | [**deleteProductsBatch**](docs/Api/ProductsApi.md#deleteproductsbatch) | **POST** /entity/product/delete | Удалить товары
*ProductsApi* | [**getMetadata**](docs/Api/ProductsApi.md#getmetadata) | **GET** /entity/product/metadata | Получить метаданные товаров
*ProductsApi* | [**getProductById**](docs/Api/ProductsApi.md#getproductbyid) | **GET** /entity/product/{id} | Получить товар по ID
*ProductsApi* | [**getProductFiles**](docs/Api/ProductsApi.md#getproductfiles) | **GET** /entity/product/{id}/files | Получить файлы товара
*ProductsApi* | [**getProductImages**](docs/Api/ProductsApi.md#getproductimages) | **GET** /entity/product/{id}/images | Получить изображения товара
*ProductsApi* | [**getProductStoreBalanceById**](docs/Api/ProductsApi.md#getproductstorebalancebyid) | **GET** /entity/product/{id}/storebalances/{storeBalanceId} | Получить НСО товара по складу
*ProductsApi* | [**getProductStoreBalances**](docs/Api/ProductsApi.md#getproductstorebalances) | **GET** /entity/product/{id}/storebalances | Получить НСО товара по складам
*ProductsApi* | [**getProducts**](docs/Api/ProductsApi.md#getproducts) | **GET** /entity/product | Получить список товаров
*ProductsApi* | [**updateProduct**](docs/Api/ProductsApi.md#updateproduct) | **PUT** /entity/product/{id} | Обновить товар
*ProductsApi* | [**updateProductStoreBalance**](docs/Api/ProductsApi.md#updateproductstorebalance) | **PUT** /entity/product/{id}/storebalances/{storeBalanceId} | Изменить НСО товара по складу
*ServicesApi* | [**addServiceFiles**](docs/Api/ServicesApi.md#addservicefiles) | **POST** /entity/service/{id}/files | Добавить файлы к услуге
*ServicesApi* | [**createService**](docs/Api/ServicesApi.md#createservice) | **POST** /entity/service | Создать услугу
*ServicesApi* | [**createServicesBatch**](docs/Api/ServicesApi.md#createservicesbatch) | **POST** /entity/service/batch | Создать или изменить услуги
*ServicesApi* | [**deleteService**](docs/Api/ServicesApi.md#deleteservice) | **DELETE** /entity/service/{id} | Удалить услугу
*ServicesApi* | [**deleteServiceFile**](docs/Api/ServicesApi.md#deleteservicefile) | **DELETE** /entity/service/{id}/files/{fileId} | Удалить файл услуги
*ServicesApi* | [**deleteServicesBatch**](docs/Api/ServicesApi.md#deleteservicesbatch) | **POST** /entity/service/delete | Удалить услугу
*ServicesApi* | [**getServiceById**](docs/Api/ServicesApi.md#getservicebyid) | **GET** /entity/service/{id} | Получить услугу по ID
*ServicesApi* | [**getServiceFiles**](docs/Api/ServicesApi.md#getservicefiles) | **GET** /entity/service/{id}/files | Получить файлы услуги
*ServicesApi* | [**getServices**](docs/Api/ServicesApi.md#getservices) | **GET** /entity/service | Получить список товаров
*ServicesApi* | [**updateService**](docs/Api/ServicesApi.md#updateservice) | **PUT** /entity/service/{id} | Обновить услугу
*UomsApi* | [**createUom**](docs/Api/UomsApi.md#createuom) | **POST** /entity/uom | Создать единицу измерения
*UomsApi* | [**createUomsBatch**](docs/Api/UomsApi.md#createuomsbatch) | **POST** /entity/uom/batch | Создать или изменить единицу измерения
*UomsApi* | [**deleteUom**](docs/Api/UomsApi.md#deleteuom) | **DELETE** /entity/uom/{id} | Удалить единицу измерения
*UomsApi* | [**deleteUomsBatch**](docs/Api/UomsApi.md#deleteuomsbatch) | **POST** /entity/uom/delete | Удалить единицу измерения
*UomsApi* | [**getUomById**](docs/Api/UomsApi.md#getuombyid) | **GET** /entity/uom/{id} | Получить единицу измерения по ID
*UomsApi* | [**getUoms**](docs/Api/UomsApi.md#getuoms) | **GET** /entity/uom | Получить список единиц измерения
*UomsApi* | [**updateUom**](docs/Api/UomsApi.md#updateuom) | **PUT** /entity/uom/{id} | Обновить единицы измерения

## Models

- [Account](docs/Model/Account.md)
- [AccumulationDiscount](docs/Model/AccumulationDiscount.md)
- [ActivateEmployee200Response](docs/Model/ActivateEmployee200Response.md)
- [ActivateEmployeeRequest](docs/Model/ActivateEmployeeRequest.md)
- [ActivateEmployeeRequestGroup](docs/Model/ActivateEmployeeRequestGroup.md)
- [AddProductImagesRequest](docs/Model/AddProductImagesRequest.md)
- [Address](docs/Model/Address.md)
- [AgentDiscount](docs/Model/AgentDiscount.md)
- [Application](docs/Model/Application.md)
- [AttributeAbstract](docs/Model/AttributeAbstract.md)
- [AttributeBase](docs/Model/AttributeBase.md)
- [AttributeBool](docs/Model/AttributeBool.md)
- [AttributeCustomEntity](docs/Model/AttributeCustomEntity.md)
- [AttributeDateTime](docs/Model/AttributeDateTime.md)
- [AttributeDouble](docs/Model/AttributeDouble.md)
- [AttributeFile](docs/Model/AttributeFile.md)
- [AttributeLink](docs/Model/AttributeLink.md)
- [AttributeLong](docs/Model/AttributeLong.md)
- [AttributeMetaInfo](docs/Model/AttributeMetaInfo.md)
- [AttributeMetaInfoList](docs/Model/AttributeMetaInfoList.md)
- [AttributeObject](docs/Model/AttributeObject.md)
- [AttributeString](docs/Model/AttributeString.md)
- [AttributeText](docs/Model/AttributeText.md)
- [Barcode](docs/Model/Barcode.md)
- [BonusProgram](docs/Model/BonusProgram.md)
- [BuyPrice](docs/Model/BuyPrice.md)
- [Cashier](docs/Model/Cashier.md)
- [ContactPerson](docs/Model/ContactPerson.md)
- [Context](docs/Model/Context.md)
- [Counterparty](docs/Model/Counterparty.md)
- [CounterpartyAccounts](docs/Model/CounterpartyAccounts.md)
- [CounterpartyContactpersons](docs/Model/CounterpartyContactpersons.md)
- [CounterpartyList](docs/Model/CounterpartyList.md)
- [CounterpartyMetadata](docs/Model/CounterpartyMetadata.md)
- [CounterpartyMetadataStatesInner](docs/Model/CounterpartyMetadataStatesInner.md)
- [CounterpartyNotes](docs/Model/CounterpartyNotes.md)
- [Country](docs/Model/Country.md)
- [CountryList](docs/Model/CountryList.md)
- [CreateCounterpartiesBatch200ResponseInner](docs/Model/CreateCounterpartiesBatch200ResponseInner.md)
- [CreateCountriesBatch200ResponseInner](docs/Model/CreateCountriesBatch200ResponseInner.md)
- [CreateCurrenciesBatch200ResponseInner](docs/Model/CreateCurrenciesBatch200ResponseInner.md)
- [CreateEmployeesBatch200ResponseInner](docs/Model/CreateEmployeesBatch200ResponseInner.md)
- [CreatePriceTypesBatch200ResponseInner](docs/Model/CreatePriceTypesBatch200ResponseInner.md)
- [CreateProductFoldersBatch200ResponseInner](docs/Model/CreateProductFoldersBatch200ResponseInner.md)
- [CreateProductsBatch200ResponseInner](docs/Model/CreateProductsBatch200ResponseInner.md)
- [CreateServicesBatch200ResponseInner](docs/Model/CreateServicesBatch200ResponseInner.md)
- [CreateUomsBatch200ResponseInner](docs/Model/CreateUomsBatch200ResponseInner.md)
- [Currency](docs/Model/Currency.md)
- [CurrencyList](docs/Model/CurrencyList.md)
- [CurrencyMajorUnit](docs/Model/CurrencyMajorUnit.md)
- [CurrencyMinorUnit](docs/Model/CurrencyMinorUnit.md)
- [DeleteInfo](docs/Model/DeleteInfo.md)
- [DeleteProductImagesRequestInner](docs/Model/DeleteProductImagesRequestInner.md)
- [DeleteProductsBatch200ResponseInner](docs/Model/DeleteProductsBatch200ResponseInner.md)
- [DiscountBase](docs/Model/DiscountBase.md)
- [Employee](docs/Model/Employee.md)
- [EmployeeList](docs/Model/EmployeeList.md)
- [EmployeeRole](docs/Model/EmployeeRole.md)
- [EmployeeSalary](docs/Model/EmployeeSalary.md)
- [EmployeeSecurity](docs/Model/EmployeeSecurity.md)
- [EmployeeSecurityGroup](docs/Model/EmployeeSecurityGroup.md)
- [Error](docs/Model/Error.md)
- [ErrorErrorsInner](docs/Model/ErrorErrorsInner.md)
- [ErrorOrArray](docs/Model/ErrorOrArray.md)
- [File](docs/Model/File.md)
- [FileList](docs/Model/FileList.md)
- [FileUpload](docs/Model/FileUpload.md)
- [GetCounterpartyAccounts200Response](docs/Model/GetCounterpartyAccounts200Response.md)
- [GetCounterpartyContactPersons200Response](docs/Model/GetCounterpartyContactPersons200Response.md)
- [GetCounterpartyNotes200Response](docs/Model/GetCounterpartyNotes200Response.md)
- [GetProductFiles200Response](docs/Model/GetProductFiles200Response.md)
- [GetProductImages200Response](docs/Model/GetProductImages200Response.md)
- [Group](docs/Model/Group.md)
- [GroupList](docs/Model/GroupList.md)
- [Image](docs/Model/Image.md)
- [ImageList](docs/Model/ImageList.md)
- [Meta](docs/Model/Meta.md)
- [MetaList](docs/Model/MetaList.md)
- [Metadata](docs/Model/Metadata.md)
- [MinPrice](docs/Model/MinPrice.md)
- [MinimumStockAbstract](docs/Model/MinimumStockAbstract.md)
- [MinimumStockAllWarehouseSame](docs/Model/MinimumStockAllWarehouseSame.md)
- [MinimumStockAllWarehouseSum](docs/Model/MinimumStockAllWarehouseSum.md)
- [MinimumStockWarehouseVaried](docs/Model/MinimumStockWarehouseVaried.md)
- [Note](docs/Model/Note.md)
- [Pack](docs/Model/Pack.md)
- [PersonalDiscount](docs/Model/PersonalDiscount.md)
- [PriceType](docs/Model/PriceType.md)
- [Product](docs/Model/Product.md)
- [ProductAlcoholic](docs/Model/ProductAlcoholic.md)
- [ProductFolder](docs/Model/ProductFolder.md)
- [ProductFolderList](docs/Model/ProductFolderList.md)
- [ProductList](docs/Model/ProductList.md)
- [Region](docs/Model/Region.md)
- [RetailStore](docs/Model/RetailStore.md)
- [RetailStoreAcquire](docs/Model/RetailStoreAcquire.md)
- [RetailStoreCashiers](docs/Model/RetailStoreCashiers.md)
- [RetailStoreCreateOrderWithState](docs/Model/RetailStoreCreateOrderWithState.md)
- [RetailStoreEnvironment](docs/Model/RetailStoreEnvironment.md)
- [RetailStoreEnvironmentChequePrinter](docs/Model/RetailStoreEnvironmentChequePrinter.md)
- [RetailStoreEnvironmentChequePrinterDriver](docs/Model/RetailStoreEnvironmentChequePrinterDriver.md)
- [RetailStoreEnvironmentChequePrinterFiscalMemory](docs/Model/RetailStoreEnvironmentChequePrinterFiscalMemory.md)
- [RetailStoreEnvironmentSoftware](docs/Model/RetailStoreEnvironmentSoftware.md)
- [RetailStoreLastOperationNamesInner](docs/Model/RetailStoreLastOperationNamesInner.md)
- [RetailStoreOrderToState](docs/Model/RetailStoreOrderToState.md)
- [RetailStoreOrganization](docs/Model/RetailStoreOrganization.md)
- [RetailStoreProductFolders](docs/Model/RetailStoreProductFolders.md)
- [RetailStoreQrAcquire](docs/Model/RetailStoreQrAcquire.md)
- [RetailStoreReceiptTemplate](docs/Model/RetailStoreReceiptTemplate.md)
- [RetailStoreState](docs/Model/RetailStoreState.md)
- [RetailStoreStateFiscalMemory](docs/Model/RetailStoreStateFiscalMemory.md)
- [RetailStoreStateFiscalMemoryError](docs/Model/RetailStoreStateFiscalMemoryError.md)
- [RetailStoreStatePaymentTerminal](docs/Model/RetailStoreStatePaymentTerminal.md)
- [RetailStoreStateSync](docs/Model/RetailStoreStateSync.md)
- [SalePrice](docs/Model/SalePrice.md)
- [Service](docs/Model/Service.md)
- [ServiceList](docs/Model/ServiceList.md)
- [State](docs/Model/State.md)
- [Store](docs/Model/Store.md)
- [StoreBalance](docs/Model/StoreBalance.md)
- [StoreBalanceList](docs/Model/StoreBalanceList.md)
- [StoreSlots](docs/Model/StoreSlots.md)
- [StoreZones](docs/Model/StoreZones.md)
- [Uom](docs/Model/Uom.md)
- [UomList](docs/Model/UomList.md)

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
