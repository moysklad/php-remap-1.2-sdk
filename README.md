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


$apiInstance = new OpenAPI\Client\Api\BundlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bundle = new \OpenAPI\Client\Model\Bundle(); // \OpenAPI\Client\Model\Bundle
$accept = 'application/json;charset=utf-8'; // string
$accept_encoding = gzip, deflate, br; // string
$expand = agent,organization; // string | Замена ссылок объектами с помощью expand
$content_type = 'application/json'; // string

try {
    $result = $apiInstance->createBundle($bundle, $accept, $accept_encoding, $expand, $content_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BundlesApi->createBundle: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.moysklad.ru/api/remap/1.2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BundlesApi* | [**createBundle**](docs/Api/BundlesApi.md#createbundle) | **POST** /entity/bundle | Создать Комплект
*BundlesApi* | [**createBundleComponents**](docs/Api/BundlesApi.md#createbundlecomponents) | **POST** /entity/bundle/{id}/components | Добавить компонент Комплекта
*BundlesApi* | [**createBundlesBatch**](docs/Api/BundlesApi.md#createbundlesbatch) | **POST** /entity/bundle/batch | Массовое создание и обновление Комплектов
*BundlesApi* | [**deleteBundle**](docs/Api/BundlesApi.md#deletebundle) | **DELETE** /entity/bundle/{id} | Удалить Комплект
*BundlesApi* | [**deleteBundleComponent**](docs/Api/BundlesApi.md#deletebundlecomponent) | **DELETE** /entity/bundle/{id}/components/{componentId} | Удалить компонент
*BundlesApi* | [**deleteBundleComponentsBatch**](docs/Api/BundlesApi.md#deletebundlecomponentsbatch) | **POST** /entity/bundle/{id}/components/delete | Массовое удаление компонентов Комплекта
*BundlesApi* | [**deleteBundlesBatch**](docs/Api/BundlesApi.md#deletebundlesbatch) | **POST** /entity/bundle/delete | Массовое удаление Комплектов
*BundlesApi* | [**getBundleById**](docs/Api/BundlesApi.md#getbundlebyid) | **GET** /entity/bundle/{id} | Получить Комплект
*BundlesApi* | [**getBundleComponentById**](docs/Api/BundlesApi.md#getbundlecomponentbyid) | **GET** /entity/bundle/{id}/components/{componentId} | Получить компонент
*BundlesApi* | [**getBundleComponents**](docs/Api/BundlesApi.md#getbundlecomponents) | **GET** /entity/bundle/{id}/components | Получить компоненты Комплекта
*BundlesApi* | [**getBundles**](docs/Api/BundlesApi.md#getbundles) | **GET** /entity/bundle | Получить список комплектов
*BundlesApi* | [**updateBundle**](docs/Api/BundlesApi.md#updatebundle) | **PUT** /entity/bundle/{id} | Изменить Комплект
*BundlesApi* | [**updateBundleComponent**](docs/Api/BundlesApi.md#updatebundlecomponent) | **PUT** /entity/bundle/{id}/components/{componentId} | Изменить компонент
*CashiersApi* | [**getCashierById**](docs/Api/CashiersApi.md#getcashierbyid) | **GET** /entity/retailstore/{retailStoreId}/cashiers/{id} | Получить Кассира
*CashiersApi* | [**getCashiers**](docs/Api/CashiersApi.md#getcashiers) | **GET** /entity/retailstore/{retailStoreId}/cashiers | Получить Кассиров
*ContractsApi* | [**createContract**](docs/Api/ContractsApi.md#createcontract) | **POST** /entity/contract | Создать договор
*ContractsApi* | [**createContractMetadataAttribute**](docs/Api/ContractsApi.md#createcontractmetadataattribute) | **POST** /entity/contract/metadata/attributes | Создать доп. поле договора
*ContractsApi* | [**createContractsBatch**](docs/Api/ContractsApi.md#createcontractsbatch) | **POST** /entity/contract/batch | Создать или изменить договоры
*ContractsApi* | [**deleteContract**](docs/Api/ContractsApi.md#deletecontract) | **DELETE** /entity/contract/{id} | Удалить договор
*ContractsApi* | [**deleteContractMetadataAttribute**](docs/Api/ContractsApi.md#deletecontractmetadataattribute) | **DELETE** /entity/contract/metadata/attributes/{id} | Удалить доп. поле договора
*ContractsApi* | [**deleteContractsBatch**](docs/Api/ContractsApi.md#deletecontractsbatch) | **POST** /entity/contract/delete | Удалить договоры
*ContractsApi* | [**getContractById**](docs/Api/ContractsApi.md#getcontractbyid) | **GET** /entity/contract/{id} | Получить договор по ID
*ContractsApi* | [**getContractMetadata**](docs/Api/ContractsApi.md#getcontractmetadata) | **GET** /entity/contract/metadata | Получить метаданные договоров
*ContractsApi* | [**getContractMetadataAttributeById**](docs/Api/ContractsApi.md#getcontractmetadataattributebyid) | **GET** /entity/contract/metadata/attributes/{id} | Получить доп. поле договора по ID
*ContractsApi* | [**getContractMetadataAttributes**](docs/Api/ContractsApi.md#getcontractmetadataattributes) | **GET** /entity/contract/metadata/attributes | Получить доп. поля договоров
*ContractsApi* | [**getContracts**](docs/Api/ContractsApi.md#getcontracts) | **GET** /entity/contract | Получить список договоров
*ContractsApi* | [**updateContract**](docs/Api/ContractsApi.md#updatecontract) | **PUT** /entity/contract/{id} | Обновить договор
*ContractsApi* | [**updateContractMetadataAttribute**](docs/Api/ContractsApi.md#updatecontractmetadataattribute) | **PUT** /entity/contract/metadata/attributes/{id} | Обновить доп. поле договора
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
*CustomerOrdersApi* | [**createCustomerOrder**](docs/Api/CustomerOrdersApi.md#createcustomerorder) | **POST** /entity/customerorder | Создать CustomerOrders
*CustomerOrdersApi* | [**createCustomerOrderBatch**](docs/Api/CustomerOrdersApi.md#createcustomerorderbatch) | **POST** /entity/customerorder/batch | Массовое создание и обновление CustomerOrders
*CustomerOrdersApi* | [**createCustomerOrderMetadataAttribute**](docs/Api/CustomerOrdersApi.md#createcustomerordermetadataattribute) | **POST** /entity/customerorder/metadata/attributes | Создать Доп. поле CustomerOrder
*CustomerOrdersApi* | [**createCustomerOrderPositions**](docs/Api/CustomerOrdersApi.md#createcustomerorderpositions) | **POST** /entity/customerorder/{id}/positions | Создать позиции CustomerOrders
*CustomerOrdersApi* | [**deleteCustomerOrder**](docs/Api/CustomerOrdersApi.md#deletecustomerorder) | **DELETE** /entity/customerorder/{id} | Удалить CustomerOrders
*CustomerOrdersApi* | [**deleteCustomerOrderBatch**](docs/Api/CustomerOrdersApi.md#deletecustomerorderbatch) | **POST** /entity/customerorder/delete | Массовое удаление CustomerOrders
*CustomerOrdersApi* | [**deleteCustomerOrderMetadataAttributeById**](docs/Api/CustomerOrdersApi.md#deletecustomerordermetadataattributebyid) | **DELETE** /entity/customerorder/metadata/attributes/{id} | Удалить отдельное доп. поле CustomerOrder
*CustomerOrdersApi* | [**deleteCustomerOrderMetadataStateById**](docs/Api/CustomerOrdersApi.md#deletecustomerordermetadatastatebyid) | **DELETE** /entity/customerorder/metadata/states/{id} | Удалить отдельный статус CustomerOrder
*CustomerOrdersApi* | [**deleteCustomerOrderPosition**](docs/Api/CustomerOrdersApi.md#deletecustomerorderposition) | **DELETE** /entity/customerorder/{id}/positions/{positionId} | Удалить позицию CustomerOrders
*CustomerOrdersApi* | [**deleteCustomerOrderPositionsBatch**](docs/Api/CustomerOrdersApi.md#deletecustomerorderpositionsbatch) | **POST** /entity/customerorder/{id}/positions/delete | Массовое удаление позиций CustomerOrders
*CustomerOrdersApi* | [**getCustomerOrderById**](docs/Api/CustomerOrdersApi.md#getcustomerorderbyid) | **GET** /entity/customerorder/{id} | Получить CustomerOrders
*CustomerOrdersApi* | [**getCustomerOrderList**](docs/Api/CustomerOrdersApi.md#getcustomerorderlist) | **GET** /entity/customerorder | Получить список CustomerOrders
*CustomerOrdersApi* | [**getCustomerOrderMetadata**](docs/Api/CustomerOrdersApi.md#getcustomerordermetadata) | **GET** /entity/customerorder/metadata | Метаданные CustomerOrders
*CustomerOrdersApi* | [**getCustomerOrderMetadataAttribute**](docs/Api/CustomerOrdersApi.md#getcustomerordermetadataattribute) | **GET** /entity/customerorder/metadata/attributes | Доп. поля CustomerOrder
*CustomerOrdersApi* | [**getCustomerOrderMetadataAttributeById**](docs/Api/CustomerOrdersApi.md#getcustomerordermetadataattributebyid) | **GET** /entity/customerorder/metadata/attributes/{id} | Отдельное доп. поле CustomerOrder
*CustomerOrdersApi* | [**getCustomerOrderMetadataStateById**](docs/Api/CustomerOrdersApi.md#getcustomerordermetadatastatebyid) | **GET** /entity/customerorder/metadata/states/{id} | Отдельный статус CustomerOrder
*CustomerOrdersApi* | [**getCustomerOrderPositionById**](docs/Api/CustomerOrdersApi.md#getcustomerorderpositionbyid) | **GET** /entity/customerorder/{id}/positions/{positionId} | Получить позицию CustomerOrders
*CustomerOrdersApi* | [**getCustomerOrderPositions**](docs/Api/CustomerOrdersApi.md#getcustomerorderpositions) | **GET** /entity/customerorder/{id}/positions | Получить позиции CustomerOrders
*CustomerOrdersApi* | [**getCustomerOrderTemplate**](docs/Api/CustomerOrdersApi.md#getcustomerordertemplate) | **PUT** /entity/customerorder/new | Шаблон CustomerOrders
*CustomerOrdersApi* | [**updateCustomerOrder**](docs/Api/CustomerOrdersApi.md#updatecustomerorder) | **PUT** /entity/customerorder/{id} | Изменить CustomerOrders
*CustomerOrdersApi* | [**updateCustomerOrderMetadataAttributeById**](docs/Api/CustomerOrdersApi.md#updatecustomerordermetadataattributebyid) | **PUT** /entity/customerorder/metadata/attributes/{id} | Обновить отдельное доп. поле CustomerOrder
*CustomerOrdersApi* | [**updateCustomerOrderMetadataStateById**](docs/Api/CustomerOrdersApi.md#updatecustomerordermetadatastatebyid) | **PUT** /entity/customerorder/metadata/states/{id} | Обновить отдельный статус CustomerOrder
*CustomerOrdersApi* | [**updateCustomerOrderPosition**](docs/Api/CustomerOrdersApi.md#updatecustomerorderposition) | **PUT** /entity/customerorder/{id}/positions/{positionId} | Изменить позицию CustomerOrders
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
*InternalOrdersApi* | [**createInternalOrder**](docs/Api/InternalOrdersApi.md#createinternalorder) | **POST** /entity/internalorder | Создать InternalOrder
*InternalOrdersApi* | [**createInternalOrderBatch**](docs/Api/InternalOrdersApi.md#createinternalorderbatch) | **POST** /entity/internalorder/batch | Массовое создание и обновление InternalOrder
*InternalOrdersApi* | [**createInternalOrderMetadataAttribute**](docs/Api/InternalOrdersApi.md#createinternalordermetadataattribute) | **POST** /entity/internalorder/metadata/attributes | Создать Доп. поле InternalOrder
*InternalOrdersApi* | [**createInternalOrderPositions**](docs/Api/InternalOrdersApi.md#createinternalorderpositions) | **POST** /entity/internalorder/{id}/positions | Создать позиции InternalOrder
*InternalOrdersApi* | [**deleteInternalOrder**](docs/Api/InternalOrdersApi.md#deleteinternalorder) | **DELETE** /entity/internalorder/{id} | Удалить InternalOrder
*InternalOrdersApi* | [**deleteInternalOrderBatch**](docs/Api/InternalOrdersApi.md#deleteinternalorderbatch) | **POST** /entity/internalorder/delete | Массовое удаление InternalOrder
*InternalOrdersApi* | [**deleteInternalOrderMetadataAttributeById**](docs/Api/InternalOrdersApi.md#deleteinternalordermetadataattributebyid) | **DELETE** /entity/internalorder/metadata/attributes/{id} | Удалить отдельное доп. поле InternalOrder
*InternalOrdersApi* | [**deleteInternalOrderMetadataStateById**](docs/Api/InternalOrdersApi.md#deleteinternalordermetadatastatebyid) | **DELETE** /entity/internalorder/metadata/states/{id} | Удалить отдельный статус InternalOrder
*InternalOrdersApi* | [**deleteInternalOrderPosition**](docs/Api/InternalOrdersApi.md#deleteinternalorderposition) | **DELETE** /entity/internalorder/{id}/positions/{positionId} | Удалить позицию InternalOrder
*InternalOrdersApi* | [**deleteInternalOrderPositionsBatch**](docs/Api/InternalOrdersApi.md#deleteinternalorderpositionsbatch) | **POST** /entity/internalorder/{id}/positions/delete | Массовое удаление позиций InternalOrder
*InternalOrdersApi* | [**getInternalOrderById**](docs/Api/InternalOrdersApi.md#getinternalorderbyid) | **GET** /entity/internalorder/{id} | Получить InternalOrder
*InternalOrdersApi* | [**getInternalOrderList**](docs/Api/InternalOrdersApi.md#getinternalorderlist) | **GET** /entity/internalorder | Получить список InternalOrder
*InternalOrdersApi* | [**getInternalOrderMetadata**](docs/Api/InternalOrdersApi.md#getinternalordermetadata) | **GET** /entity/internalorder/metadata | Метаданные InternalOrder
*InternalOrdersApi* | [**getInternalOrderMetadataAttribute**](docs/Api/InternalOrdersApi.md#getinternalordermetadataattribute) | **GET** /entity/internalorder/metadata/attributes | Доп. поля InternalOrder
*InternalOrdersApi* | [**getInternalOrderMetadataAttributeById**](docs/Api/InternalOrdersApi.md#getinternalordermetadataattributebyid) | **GET** /entity/internalorder/metadata/attributes/{id} | Отдельное доп. поле InternalOrder
*InternalOrdersApi* | [**getInternalOrderMetadataStateById**](docs/Api/InternalOrdersApi.md#getinternalordermetadatastatebyid) | **GET** /entity/internalorder/metadata/states/{id} | Отдельный статус InternalOrder
*InternalOrdersApi* | [**getInternalOrderPositionById**](docs/Api/InternalOrdersApi.md#getinternalorderpositionbyid) | **GET** /entity/internalorder/{id}/positions/{positionId} | Получить позицию InternalOrder
*InternalOrdersApi* | [**getInternalOrderPositions**](docs/Api/InternalOrdersApi.md#getinternalorderpositions) | **GET** /entity/internalorder/{id}/positions | Получить позиции InternalOrder
*InternalOrdersApi* | [**getInternalOrderTemplate**](docs/Api/InternalOrdersApi.md#getinternalordertemplate) | **PUT** /entity/internalorder/new | Шаблон InternalOrder
*InternalOrdersApi* | [**updateInternalOrder**](docs/Api/InternalOrdersApi.md#updateinternalorder) | **PUT** /entity/internalorder/{id} | Изменить InternalOrder
*InternalOrdersApi* | [**updateInternalOrderMetadataAttributeById**](docs/Api/InternalOrdersApi.md#updateinternalordermetadataattributebyid) | **PUT** /entity/internalorder/metadata/attributes/{id} | Обновить отдельное доп. поле InternalOrder
*InternalOrdersApi* | [**updateInternalOrderMetadataStateById**](docs/Api/InternalOrdersApi.md#updateinternalordermetadatastatebyid) | **PUT** /entity/internalorder/metadata/states/{id} | Обновить отдельный статус InternalOrder
*InternalOrdersApi* | [**updateInternalOrderPosition**](docs/Api/InternalOrdersApi.md#updateinternalorderposition) | **PUT** /entity/internalorder/{id}/positions/{positionId} | Изменить позицию InternalOrder
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
*PurchaseOrdersApi* | [**createPurchaseOrder**](docs/Api/PurchaseOrdersApi.md#createpurchaseorder) | **POST** /entity/purchaseorder | Создать PurchaseOrder
*PurchaseOrdersApi* | [**createPurchaseOrderBatch**](docs/Api/PurchaseOrdersApi.md#createpurchaseorderbatch) | **POST** /entity/purchaseorder/batch | Массовое создание и обновление PurchaseOrder
*PurchaseOrdersApi* | [**createPurchaseOrderMetadataAttribute**](docs/Api/PurchaseOrdersApi.md#createpurchaseordermetadataattribute) | **POST** /entity/purchaseorder/metadata/attributes | Создать Доп. поле PurchaseOrder
*PurchaseOrdersApi* | [**createPurchaseOrderPositions**](docs/Api/PurchaseOrdersApi.md#createpurchaseorderpositions) | **POST** /entity/purchaseorder/{id}/positions | Создать позиции PurchaseOrder
*PurchaseOrdersApi* | [**deletePurchaseOrder**](docs/Api/PurchaseOrdersApi.md#deletepurchaseorder) | **DELETE** /entity/purchaseorder/{id} | Удалить PurchaseOrder
*PurchaseOrdersApi* | [**deletePurchaseOrderBatch**](docs/Api/PurchaseOrdersApi.md#deletepurchaseorderbatch) | **POST** /entity/purchaseorder/delete | Массовое удаление PurchaseOrder
*PurchaseOrdersApi* | [**deletePurchaseOrderMetadataAttributeById**](docs/Api/PurchaseOrdersApi.md#deletepurchaseordermetadataattributebyid) | **DELETE** /entity/purchaseorder/metadata/attributes/{id} | Удалить отдельное доп. поле PurchaseOrder
*PurchaseOrdersApi* | [**deletePurchaseOrderMetadataStateById**](docs/Api/PurchaseOrdersApi.md#deletepurchaseordermetadatastatebyid) | **DELETE** /entity/purchaseorder/metadata/states/{id} | Удалить отдельный статус PurchaseOrder
*PurchaseOrdersApi* | [**deletePurchaseOrderPosition**](docs/Api/PurchaseOrdersApi.md#deletepurchaseorderposition) | **DELETE** /entity/purchaseorder/{id}/positions/{positionId} | Удалить позицию PurchaseOrder
*PurchaseOrdersApi* | [**deletePurchaseOrderPositionsBatch**](docs/Api/PurchaseOrdersApi.md#deletepurchaseorderpositionsbatch) | **POST** /entity/purchaseorder/{id}/positions/delete | Массовое удаление позиций PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderById**](docs/Api/PurchaseOrdersApi.md#getpurchaseorderbyid) | **GET** /entity/purchaseorder/{id} | Получить PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderList**](docs/Api/PurchaseOrdersApi.md#getpurchaseorderlist) | **GET** /entity/purchaseorder | Получить список PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderMetadata**](docs/Api/PurchaseOrdersApi.md#getpurchaseordermetadata) | **GET** /entity/purchaseorder/metadata | Метаданные PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderMetadataAttribute**](docs/Api/PurchaseOrdersApi.md#getpurchaseordermetadataattribute) | **GET** /entity/purchaseorder/metadata/attributes | Доп. поля PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderMetadataAttributeById**](docs/Api/PurchaseOrdersApi.md#getpurchaseordermetadataattributebyid) | **GET** /entity/purchaseorder/metadata/attributes/{id} | Отдельное доп. поле PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderMetadataStateById**](docs/Api/PurchaseOrdersApi.md#getpurchaseordermetadatastatebyid) | **GET** /entity/purchaseorder/metadata/states/{id} | Отдельный статус PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderPositionById**](docs/Api/PurchaseOrdersApi.md#getpurchaseorderpositionbyid) | **GET** /entity/purchaseorder/{id}/positions/{positionId} | Получить позицию PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderPositions**](docs/Api/PurchaseOrdersApi.md#getpurchaseorderpositions) | **GET** /entity/purchaseorder/{id}/positions | Получить позиции PurchaseOrder
*PurchaseOrdersApi* | [**getPurchaseOrderTemplate**](docs/Api/PurchaseOrdersApi.md#getpurchaseordertemplate) | **PUT** /entity/purchaseorder/new | Шаблон PurchaseOrder
*PurchaseOrdersApi* | [**updatePurchaseOrder**](docs/Api/PurchaseOrdersApi.md#updatepurchaseorder) | **PUT** /entity/purchaseorder/{id} | Изменить PurchaseOrder
*PurchaseOrdersApi* | [**updatePurchaseOrderMetadataAttributeById**](docs/Api/PurchaseOrdersApi.md#updatepurchaseordermetadataattributebyid) | **PUT** /entity/purchaseorder/metadata/attributes/{id} | Обновить отдельное доп. поле PurchaseOrder
*PurchaseOrdersApi* | [**updatePurchaseOrderMetadataStateById**](docs/Api/PurchaseOrdersApi.md#updatepurchaseordermetadatastatebyid) | **PUT** /entity/purchaseorder/metadata/states/{id} | Обновить отдельный статус PurchaseOrder
*PurchaseOrdersApi* | [**updatePurchaseOrderPosition**](docs/Api/PurchaseOrdersApi.md#updatepurchaseorderposition) | **PUT** /entity/purchaseorder/{id}/positions/{positionId} | Изменить позицию PurchaseOrder
*RetailStoresApi* | [**addMasterRetailStore**](docs/Api/RetailStoresApi.md#addmasterretailstore) | **POST** /entity/retailstore/{retailStoreId}/masterRetailStores | Добавить мастер точку продаж
*RetailStoresApi* | [**createRetailStore**](docs/Api/RetailStoresApi.md#createretailstore) | **POST** /entity/retailstore | Создать точку продаж
*RetailStoresApi* | [**createRetailStoresBatch**](docs/Api/RetailStoresApi.md#createretailstoresbatch) | **POST** /entity/retailstore/batch | Массовое создание и обновление точек продаж
*RetailStoresApi* | [**deleteRetailStore**](docs/Api/RetailStoresApi.md#deleteretailstore) | **DELETE** /entity/retailstore/{id} | Удалить точку продаж
*RetailStoresApi* | [**deleteRetailStoresBatch**](docs/Api/RetailStoresApi.md#deleteretailstoresbatch) | **POST** /entity/retailstore/delete | Массовое удаление точек продаж
*RetailStoresApi* | [**getMasterRetailStores**](docs/Api/RetailStoresApi.md#getmasterretailstores) | **GET** /entity/retailstore/{retailStoreId}/masterRetailStores | Получить мастер точки продаж
*RetailStoresApi* | [**getRetailStoreById**](docs/Api/RetailStoresApi.md#getretailstorebyid) | **GET** /entity/retailstore/{id} | Получить точку продаж
*RetailStoresApi* | [**getRetailStores**](docs/Api/RetailStoresApi.md#getretailstores) | **GET** /entity/retailstore | Получить точки продаж
*RetailStoresApi* | [**updateRetailStore**](docs/Api/RetailStoresApi.md#updateretailstore) | **PUT** /entity/retailstore/{id} | Изменить точку продаж
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
*StoresApi* | [**createStore**](docs/Api/StoresApi.md#createstore) | **POST** /entity/store | Создать Склад
*StoresApi* | [**createStoreMetadataAttribute**](docs/Api/StoresApi.md#createstoremetadataattribute) | **POST** /entity/store/metadata/attributes | Создать Доп. поле Store
*StoresApi* | [**createStoreSlots**](docs/Api/StoresApi.md#createstoreslots) | **POST** /entity/store/{storeId}/slots | Создать ячейку склада
*StoresApi* | [**createStoreZones**](docs/Api/StoresApi.md#createstorezones) | **POST** /entity/store/{storeId}/zones | Создать зону склада
*StoresApi* | [**createStoresBatch**](docs/Api/StoresApi.md#createstoresbatch) | **POST** /entity/store/batch | Массовое создание и обновление Складов
*StoresApi* | [**deleteStore**](docs/Api/StoresApi.md#deletestore) | **DELETE** /entity/store/{id} | Удалить Склад
*StoresApi* | [**deleteStoreSlot**](docs/Api/StoresApi.md#deletestoreslot) | **DELETE** /entity/store/{storeId}/slots/{id} | Удалить ячейку склада
*StoresApi* | [**deleteStoreSlotsBatch**](docs/Api/StoresApi.md#deletestoreslotsbatch) | **POST** /entity/store/{storeId}/slots/delete | Массовое удаление ячеек склада
*StoresApi* | [**deleteStoreZone**](docs/Api/StoresApi.md#deletestorezone) | **DELETE** /entity/store/{storeId}/zones/{id} | Удалить зону склада
*StoresApi* | [**deleteStoreZonesBatch**](docs/Api/StoresApi.md#deletestorezonesbatch) | **POST** /entity/store/{storeId}/zones/delete | Массовое удаление зон склада
*StoresApi* | [**deleteStoresBatch**](docs/Api/StoresApi.md#deletestoresbatch) | **POST** /entity/store/delete | Массовое удаление Складов
*StoresApi* | [**getStoreById**](docs/Api/StoresApi.md#getstorebyid) | **GET** /entity/store/{id} | Получить Склад
*StoresApi* | [**getStoreMetadata**](docs/Api/StoresApi.md#getstoremetadata) | **GET** /entity/store/metadata | Метаданные Складов
*StoresApi* | [**getStoreMetadataAttribute**](docs/Api/StoresApi.md#getstoremetadataattribute) | **GET** /entity/store/metadata/attributes | Доп. поля Store
*StoresApi* | [**getStoreMetadataAttributeById**](docs/Api/StoresApi.md#getstoremetadataattributebyid) | **GET** /entity/store/metadata/attributes/{id} | Отдельное доп. поле Склада
*StoresApi* | [**getStoreSlotById**](docs/Api/StoresApi.md#getstoreslotbyid) | **GET** /entity/store/{storeId}/slots/{id} | Получить ячейку склада
*StoresApi* | [**getStoreSlots**](docs/Api/StoresApi.md#getstoreslots) | **GET** /entity/store/{storeId}/slots | Получить ячейки склада
*StoresApi* | [**getStoreZoneById**](docs/Api/StoresApi.md#getstorezonebyid) | **GET** /entity/store/{storeId}/zones/{id} | Получить зону склада
*StoresApi* | [**getStoreZones**](docs/Api/StoresApi.md#getstorezones) | **GET** /entity/store/{storeId}/zones | Получить зоны склада
*StoresApi* | [**getStores**](docs/Api/StoresApi.md#getstores) | **GET** /entity/store | Получить Склады
*StoresApi* | [**updateStore**](docs/Api/StoresApi.md#updatestore) | **PUT** /entity/store/{id} | Изменить Склад
*StoresApi* | [**updateStoreSlot**](docs/Api/StoresApi.md#updatestoreslot) | **PUT** /entity/store/{storeId}/slots/{id} | Изменить ячейку склада
*StoresApi* | [**updateStoreZone**](docs/Api/StoresApi.md#updatestorezone) | **PUT** /entity/store/{storeId}/zones/{id} | Изменить зону склада
*ThingsApi* | [**getThingById**](docs/Api/ThingsApi.md#getthingbyid) | **GET** /entity/thing/{id} | Получить Серийный номер
*ThingsApi* | [**getThings**](docs/Api/ThingsApi.md#getthings) | **GET** /entity/thing | Получить Серийные номера
*UomsApi* | [**createUom**](docs/Api/UomsApi.md#createuom) | **POST** /entity/uom | Создать единицу измерения
*UomsApi* | [**createUomsBatch**](docs/Api/UomsApi.md#createuomsbatch) | **POST** /entity/uom/batch | Создать или изменить единицу измерения
*UomsApi* | [**deleteUom**](docs/Api/UomsApi.md#deleteuom) | **DELETE** /entity/uom/{id} | Удалить единицу измерения
*UomsApi* | [**deleteUomsBatch**](docs/Api/UomsApi.md#deleteuomsbatch) | **POST** /entity/uom/delete | Удалить единицу измерения
*UomsApi* | [**getUomById**](docs/Api/UomsApi.md#getuombyid) | **GET** /entity/uom/{id} | Получить единицу измерения по ID
*UomsApi* | [**getUoms**](docs/Api/UomsApi.md#getuoms) | **GET** /entity/uom | Получить список единиц измерения
*UomsApi* | [**updateUom**](docs/Api/UomsApi.md#updateuom) | **PUT** /entity/uom/{id} | Обновить единицы измерения
*VariantCharacteristicsApi* | [**createVariantCharacteristic**](docs/Api/VariantCharacteristicsApi.md#createvariantcharacteristic) | **POST** /entity/variant/metadata/characteristics | Создать Характеристику модификаций
*VariantCharacteristicsApi* | [**getVariantCharacteristicById**](docs/Api/VariantCharacteristicsApi.md#getvariantcharacteristicbyid) | **GET** /entity/variant/metadata/characteristics/{id} | Получить Характеристику модификаций
*VariantCharacteristicsApi* | [**getVariantCharacteristics**](docs/Api/VariantCharacteristicsApi.md#getvariantcharacteristics) | **GET** /entity/variant/metadata/characteristics | Получить список Характеристики модификаций
*VariantsApi* | [**createVariant**](docs/Api/VariantsApi.md#createvariant) | **POST** /entity/variant | Создать Модификацию
*VariantsApi* | [**createVariantsBatch**](docs/Api/VariantsApi.md#createvariantsbatch) | **POST** /entity/variant/batch | Массовое создание и обновление Модификаций
*VariantsApi* | [**deleteVariant**](docs/Api/VariantsApi.md#deletevariant) | **DELETE** /entity/variant/{id} | Удалить Модификацию
*VariantsApi* | [**deleteVariantsBatch**](docs/Api/VariantsApi.md#deletevariantsbatch) | **POST** /entity/variant/delete | Массовое удаление Модификаций
*VariantsApi* | [**getVariantById**](docs/Api/VariantsApi.md#getvariantbyid) | **GET** /entity/variant/{id} | Получить Модификацию
*VariantsApi* | [**getVariantMetadata**](docs/Api/VariantsApi.md#getvariantmetadata) | **GET** /entity/variant/metadata | Метаданные Модификаций
*VariantsApi* | [**getVariants**](docs/Api/VariantsApi.md#getvariants) | **GET** /entity/variant | Получить список Модификаций
*VariantsApi* | [**updateVariant**](docs/Api/VariantsApi.md#updatevariant) | **PUT** /entity/variant/{id} | Изменить Модификацию

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
- [Assortment](docs/Model/Assortment.md)
- [AssortmentWithoutBundle](docs/Model/AssortmentWithoutBundle.md)
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
- [Bundle](docs/Model/Bundle.md)
- [BundleComponent](docs/Model/BundleComponent.md)
- [BundleComponentList](docs/Model/BundleComponentList.md)
- [BundleList](docs/Model/BundleList.md)
- [BundleOverhead](docs/Model/BundleOverhead.md)
- [BuyPrice](docs/Model/BuyPrice.md)
- [CashIn](docs/Model/CashIn.md)
- [CashOut](docs/Model/CashOut.md)
- [Cashier](docs/Model/Cashier.md)
- [CashierList](docs/Model/CashierList.md)
- [Consignment](docs/Model/Consignment.md)
- [ContactPerson](docs/Model/ContactPerson.md)
- [Context](docs/Model/Context.md)
- [Context1](docs/Model/Context1.md)
- [Contract](docs/Model/Contract.md)
- [ContractList](docs/Model/ContractList.md)
- [Counterparty](docs/Model/Counterparty.md)
- [CounterpartyAccounts](docs/Model/CounterpartyAccounts.md)
- [CounterpartyContactpersons](docs/Model/CounterpartyContactpersons.md)
- [CounterpartyList](docs/Model/CounterpartyList.md)
- [CounterpartyMetadata](docs/Model/CounterpartyMetadata.md)
- [CounterpartyNotes](docs/Model/CounterpartyNotes.md)
- [Country](docs/Model/Country.md)
- [CountryList](docs/Model/CountryList.md)
- [CreateBundleComponentsRequest](docs/Model/CreateBundleComponentsRequest.md)
- [CreateBundlesBatch200ResponseInner](docs/Model/CreateBundlesBatch200ResponseInner.md)
- [CreateContractsBatch200ResponseInner](docs/Model/CreateContractsBatch200ResponseInner.md)
- [CreateCounterpartiesBatch200ResponseInner](docs/Model/CreateCounterpartiesBatch200ResponseInner.md)
- [CreateCountriesBatch200ResponseInner](docs/Model/CreateCountriesBatch200ResponseInner.md)
- [CreateCurrenciesBatch200ResponseInner](docs/Model/CreateCurrenciesBatch200ResponseInner.md)
- [CreateCustomerOrderBatch200ResponseInner](docs/Model/CreateCustomerOrderBatch200ResponseInner.md)
- [CreateCustomerOrderPositions200ResponseInner](docs/Model/CreateCustomerOrderPositions200ResponseInner.md)
- [CreateCustomerOrderPositionsRequest](docs/Model/CreateCustomerOrderPositionsRequest.md)
- [CreateEmployeesBatch200ResponseInner](docs/Model/CreateEmployeesBatch200ResponseInner.md)
- [CreateInternalOrderBatch200ResponseInner](docs/Model/CreateInternalOrderBatch200ResponseInner.md)
- [CreateInternalOrderPositions200ResponseInner](docs/Model/CreateInternalOrderPositions200ResponseInner.md)
- [CreateInternalOrderPositionsRequest](docs/Model/CreateInternalOrderPositionsRequest.md)
- [CreatePriceTypesBatch200ResponseInner](docs/Model/CreatePriceTypesBatch200ResponseInner.md)
- [CreateProductFoldersBatch200ResponseInner](docs/Model/CreateProductFoldersBatch200ResponseInner.md)
- [CreateProductsBatch200ResponseInner](docs/Model/CreateProductsBatch200ResponseInner.md)
- [CreatePurchaseOrderBatch200ResponseInner](docs/Model/CreatePurchaseOrderBatch200ResponseInner.md)
- [CreatePurchaseOrderPositions200ResponseInner](docs/Model/CreatePurchaseOrderPositions200ResponseInner.md)
- [CreatePurchaseOrderPositionsRequest](docs/Model/CreatePurchaseOrderPositionsRequest.md)
- [CreateRetailStoresBatch200ResponseInner](docs/Model/CreateRetailStoresBatch200ResponseInner.md)
- [CreateServicesBatch200ResponseInner](docs/Model/CreateServicesBatch200ResponseInner.md)
- [CreateStoreSlotsRequest](docs/Model/CreateStoreSlotsRequest.md)
- [CreateStoreZonesRequest](docs/Model/CreateStoreZonesRequest.md)
- [CreateStoresBatch200ResponseInner](docs/Model/CreateStoresBatch200ResponseInner.md)
- [CreateUomsBatch200ResponseInner](docs/Model/CreateUomsBatch200ResponseInner.md)
- [CreateVariantsBatch200ResponseInner](docs/Model/CreateVariantsBatch200ResponseInner.md)
- [Currency](docs/Model/Currency.md)
- [CurrencyList](docs/Model/CurrencyList.md)
- [CurrencyMajorUnit](docs/Model/CurrencyMajorUnit.md)
- [CurrencyMinorUnit](docs/Model/CurrencyMinorUnit.md)
- [CustomerOrder](docs/Model/CustomerOrder.md)
- [CustomerOrderList](docs/Model/CustomerOrderList.md)
- [CustomerOrderPaymentsInner](docs/Model/CustomerOrderPaymentsInner.md)
- [CustomerOrderPosition](docs/Model/CustomerOrderPosition.md)
- [CustomerOrderPositionList](docs/Model/CustomerOrderPositionList.md)
- [DeleteContractsBatch200ResponseInner](docs/Model/DeleteContractsBatch200ResponseInner.md)
- [DeleteInfo](docs/Model/DeleteInfo.md)
- [DeleteProductImagesRequestInner](docs/Model/DeleteProductImagesRequestInner.md)
- [Demand](docs/Model/Demand.md)
- [DiscountBase](docs/Model/DiscountBase.md)
- [DocumentMetadata](docs/Model/DocumentMetadata.md)
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
- [GetVariantCharacteristics200Response](docs/Model/GetVariantCharacteristics200Response.md)
- [Group](docs/Model/Group.md)
- [GroupList](docs/Model/GroupList.md)
- [Image](docs/Model/Image.md)
- [ImageList](docs/Model/ImageList.md)
- [InternalOrder](docs/Model/InternalOrder.md)
- [InternalOrderList](docs/Model/InternalOrderList.md)
- [InternalOrderPosition](docs/Model/InternalOrderPosition.md)
- [InternalOrderPositionList](docs/Model/InternalOrderPositionList.md)
- [InternalOrderRate](docs/Model/InternalOrderRate.md)
- [InvoiceIn](docs/Model/InvoiceIn.md)
- [InvoiceOut](docs/Model/InvoiceOut.md)
- [Meta](docs/Model/Meta.md)
- [MetaList](docs/Model/MetaList.md)
- [Metadata](docs/Model/Metadata.md)
- [MinPrice](docs/Model/MinPrice.md)
- [MinimumStockAbstract](docs/Model/MinimumStockAbstract.md)
- [MinimumStockAllWarehouseSame](docs/Model/MinimumStockAllWarehouseSame.md)
- [MinimumStockAllWarehouseSum](docs/Model/MinimumStockAllWarehouseSum.md)
- [MinimumStockWarehouseVaried](docs/Model/MinimumStockWarehouseVaried.md)
- [Move](docs/Model/Move.md)
- [Note](docs/Model/Note.md)
- [Organization](docs/Model/Organization.md)
- [Pack](docs/Model/Pack.md)
- [PaymentIn](docs/Model/PaymentIn.md)
- [PaymentOut](docs/Model/PaymentOut.md)
- [PersonalDiscount](docs/Model/PersonalDiscount.md)
- [Prepayment](docs/Model/Prepayment.md)
- [PriceType](docs/Model/PriceType.md)
- [ProcessingOrder](docs/Model/ProcessingOrder.md)
- [Product](docs/Model/Product.md)
- [ProductAlcoholic](docs/Model/ProductAlcoholic.md)
- [ProductFolder](docs/Model/ProductFolder.md)
- [ProductFolderList](docs/Model/ProductFolderList.md)
- [ProductList](docs/Model/ProductList.md)
- [ProductionTask](docs/Model/ProductionTask.md)
- [Project](docs/Model/Project.md)
- [PurchaseOrder](docs/Model/PurchaseOrder.md)
- [PurchaseOrderList](docs/Model/PurchaseOrderList.md)
- [PurchaseOrderPaymentsInner](docs/Model/PurchaseOrderPaymentsInner.md)
- [PurchaseOrderPosition](docs/Model/PurchaseOrderPosition.md)
- [PurchaseOrderPositionList](docs/Model/PurchaseOrderPositionList.md)
- [Region](docs/Model/Region.md)
- [RetailStore](docs/Model/RetailStore.md)
- [RetailStoreEnvironment](docs/Model/RetailStoreEnvironment.md)
- [RetailStoreEnvironmentChequePrinter](docs/Model/RetailStoreEnvironmentChequePrinter.md)
- [RetailStoreEnvironmentChequePrinterDriver](docs/Model/RetailStoreEnvironmentChequePrinterDriver.md)
- [RetailStoreEnvironmentChequePrinterFiscalMemory](docs/Model/RetailStoreEnvironmentChequePrinterFiscalMemory.md)
- [RetailStoreEnvironmentSoftware](docs/Model/RetailStoreEnvironmentSoftware.md)
- [RetailStoreLastOperationNamesInner](docs/Model/RetailStoreLastOperationNamesInner.md)
- [RetailStoreList](docs/Model/RetailStoreList.md)
- [RetailStoreReceiptTemplate](docs/Model/RetailStoreReceiptTemplate.md)
- [RetailStoreState](docs/Model/RetailStoreState.md)
- [RetailStoreStateFiscalMemory](docs/Model/RetailStoreStateFiscalMemory.md)
- [RetailStoreStateFiscalMemoryError](docs/Model/RetailStoreStateFiscalMemoryError.md)
- [RetailStoreStatePaymentTerminal](docs/Model/RetailStoreStatePaymentTerminal.md)
- [RetailStoreStateSync](docs/Model/RetailStoreStateSync.md)
- [SalePrice](docs/Model/SalePrice.md)
- [SalesChannel](docs/Model/SalesChannel.md)
- [Service](docs/Model/Service.md)
- [ServiceList](docs/Model/ServiceList.md)
- [State](docs/Model/State.md)
- [Store](docs/Model/Store.md)
- [StoreBalance](docs/Model/StoreBalance.md)
- [StoreBalanceList](docs/Model/StoreBalanceList.md)
- [StoreList](docs/Model/StoreList.md)
- [StoreMetadata](docs/Model/StoreMetadata.md)
- [StoreSlot](docs/Model/StoreSlot.md)
- [StoreSlotList](docs/Model/StoreSlotList.md)
- [StoreZone](docs/Model/StoreZone.md)
- [StoreZoneList](docs/Model/StoreZoneList.md)
- [Supply](docs/Model/Supply.md)
- [Thing](docs/Model/Thing.md)
- [ThingList](docs/Model/ThingList.md)
- [Uom](docs/Model/Uom.md)
- [UomList](docs/Model/UomList.md)
- [Variant](docs/Model/Variant.md)
- [VariantCharacteristic](docs/Model/VariantCharacteristic.md)
- [VariantCharacteristicValue](docs/Model/VariantCharacteristicValue.md)
- [VariantList](docs/Model/VariantList.md)
- [VariantMetadata](docs/Model/VariantMetadata.md)
- [VariantPack](docs/Model/VariantPack.md)

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
