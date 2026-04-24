# # PurchaseOrderPaymentsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID Расходного ордера | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**name** | **string** | Наименование Расходного ордера | [optional]
**code** | **string** | Код Расходного ордера | [optional]
**external_code** | **string** | Внешний код Расходного ордера | [optional]
**sync_id** | **string** | ID синхронизации | [optional]
**description** | **string** | Комментарий Расходного ордера | [optional]
**created** | **string** | Дата создания | [optional] [readonly]
**deleted** | **string** | Момент последнего удаления Расходного ордера | [optional] [readonly]
**updated** | **string** | Момент последнего обновления Расходного ордера | [optional] [readonly]
**moment** | **string** | Дата документа | [optional]
**owner** | [**\OpenAPI\Client\Model\Employee**](Employee.md) | Владелец (Сотрудник) | [optional]
**group** | [**\OpenAPI\Client\Model\Group**](Group.md) |  | [optional]
**applicable** | **bool** | Отметка о проведении | [optional]
**printed** | **bool** | Напечатан ли документ | [optional] [readonly]
**published** | **bool** | Опубликован ли документ | [optional] [readonly]
**rate** | [**\OpenAPI\Client\Model\CurrencyRate**](CurrencyRate.md) |  | [optional]
**organization** | [**\OpenAPI\Client\Model\Organization**](Organization.md) |  | [optional]
**agent** | [**\OpenAPI\Client\Model\Counterparty**](Counterparty.md) |  | [optional]
**expense_item** | [**\OpenAPI\Client\Model\ExpenseItem**](ExpenseItem.md) | Метаданные статьи расхода | [optional]
**attributes** | [**\OpenAPI\Client\Model\AttributeAbstract[]**](AttributeAbstract.md) | Коллекция метаданных доп. полей | [optional]
**contract** | [**\OpenAPI\Client\Model\Contract**](Contract.md) | Метаданные договора | [optional]
**files** | [**\OpenAPI\Client\Model\FileList**](FileList.md) | Метаданные массива файлов | [optional]
**no_closing_docs** | **bool** | Признак \&quot;Без закрывающих документов\&quot; | [optional]
**payment_purpose** | **string** | Основание | [optional]
**project** | [**\OpenAPI\Client\Model\Project**](Project.md) | Метаданные проекта | [optional]
**sales_channel** | [**\OpenAPI\Client\Model\SalesChannel**](SalesChannel.md) | Метаданные канала продаж | [optional]
**shared** | **bool** | Общий доступ | [optional] [readonly]
**state** | [**\OpenAPI\Client\Model\State**](State.md) | Метаданные статуса Расходного ордера | [optional]
**sum** | **float** | Сумма расходного ордера в установленной валюте | [optional] [readonly]
**vat_sum** | **float** | Сумма НДС | [optional] [readonly]
**facture_in** | [**\OpenAPI\Client\Model\FactureIn**](FactureIn.md) | Счет-фактура полученный, с которым связан этот платеж | [optional]
**operations** | [**\OpenAPI\Client\Model\CashOutOperation[]**](CashOutOperation.md) | Связанные операции: полное тело документа плюс &#x60;linkedSum&#x60;. Допустимые типы по &#x60;meta.type&#x60;: salesreturn, supply, invoicein, purchaseorder, commissionreportout. См. &#x60;CashOutOperation&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
