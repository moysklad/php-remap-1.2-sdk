# # CashIn

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID Приходного ордера | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**applicable** | **bool** | Отметка о проведении | [optional]
**name** | **string** | Наименование Приходного ордера | [optional]
**code** | **string** | Код Приходного ордера | [optional]
**external_code** | **string** | Внешний код Приходного ордера | [optional]
**sync_id** | **string** | ID синхронизации | [optional]
**description** | **string** | Комментарий Приходного ордера | [optional]
**created** | **string** | Дата создания | [optional] [readonly]
**deleted** | **string** | Момент последнего удаления Приходного ордера | [optional] [readonly]
**updated** | **string** | Момент последнего обновления Приходного ордера | [optional] [readonly]
**moment** | **string** | Дата документа | [optional]
**attributes** | [**\OpenAPI\Client\Model\AttributeAbstract[]**](AttributeAbstract.md) | Коллекция метаданных доп. полей | [optional]
**contract** | [**\OpenAPI\Client\Model\Contract**](Contract.md) | Метаданные договора | [optional]
**files** | [**\OpenAPI\Client\Model\FileList**](FileList.md) | Метаданные массива файлов | [optional]
**payment_purpose** | **string** | Основание | [optional]
**printed** | **bool** | Напечатан ли документ | [optional] [readonly]
**project** | [**\OpenAPI\Client\Model\Project**](Project.md) | Метаданные проекта | [optional]
**published** | **bool** | Опубликован ли документ | [optional] [readonly]
**owner** | [**\OpenAPI\Client\Model\Employee**](Employee.md) | Владелец (Сотрудник) | [optional]
**group** | [**\OpenAPI\Client\Model\Group**](Group.md) |  | [optional]
**sales_channel** | [**\OpenAPI\Client\Model\SalesChannel**](SalesChannel.md) | Метаданные канала продаж | [optional]
**shared** | **bool** | Общий доступ | [optional] [readonly]
**state** | [**\OpenAPI\Client\Model\State**](State.md) | Метаданные статуса Приходного ордера | [optional]
**rate** | [**\OpenAPI\Client\Model\CurrencyRate**](CurrencyRate.md) |  | [optional]
**organization** | [**\OpenAPI\Client\Model\Organization**](Organization.md) |  | [optional]
**agent** | [**\OpenAPI\Client\Model\Counterparty**](Counterparty.md) |  | [optional]
**sum** | **float** | Сумма Приходного ордера в установленной валюте | [optional] [readonly]
**vat_sum** | **float** | Сумма НДС | [optional] [readonly]
**facture_out** | [**\OpenAPI\Client\Model\FactureOut**](FactureOut.md) | Счет-фактура выданный, с которым связан этот платеж | [optional]
**operations** | [**\OpenAPI\Client\Model\CashInOperation[]**](CashInOperation.md) | Связанные операции. Допустимые типы по &#x60;meta.type&#x60;: customerorder, purchasereturn, demand, invoiceout, commissionreportin, retailshift. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
