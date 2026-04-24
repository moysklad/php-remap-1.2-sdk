# # FactureOut

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID Счета-фактуры выданного | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**agent** | [**\OpenAPI\Client\Model\Counterparty**](Counterparty.md) |  | [optional]
**applicable** | **bool** | Отметка о проведении | [optional]
**attributes** | [**\OpenAPI\Client\Model\AttributeAbstract[]**](AttributeAbstract.md) | Коллекция метаданных доп. полей | [optional]
**code** | **string** | Код Счета-фактуры выданного | [optional]
**contract** | [**\OpenAPI\Client\Model\Contract**](Contract.md) | Метаданные договора | [optional]
**created** | **string** | Дата создания | [optional] [readonly]
**deleted** | **string** | Момент последнего удаления Счета-фактуры выданного | [optional] [readonly]
**description** | **string** | Комментарий Счета-фактуры выданного | [optional]
**external_code** | **string** | Внешний код Счета-фактуры выданного | [optional]
**files** | [**\OpenAPI\Client\Model\FileList**](FileList.md) | Метаданные массива файлов | [optional]
**group** | [**\OpenAPI\Client\Model\Group**](Group.md) |  | [optional]
**moment** | **string** | Дата документа | [optional]
**name** | **string** | Наименование Счета-фактуры выданного | [optional]
**organization** | [**\OpenAPI\Client\Model\Organization**](Organization.md) |  | [optional]
**owner** | [**\OpenAPI\Client\Model\Employee**](Employee.md) | Владелец (Сотрудник) | [optional]
**printed** | **bool** | Напечатан ли документ | [optional] [readonly]
**published** | **bool** | Опубликован ли документ | [optional] [readonly]
**rate** | [**\OpenAPI\Client\Model\CurrencyRate**](CurrencyRate.md) |  | [optional]
**shared** | **bool** | Общий доступ | [optional]
**state** | [**\OpenAPI\Client\Model\State**](State.md) | Метаданные статуса Счета-фактуры выданного | [optional]
**state_contract_id** | **string** | Идентификатор государственного контракта, договора (соглашения) | [optional]
**sum** | **float** | Сумма Счета-фактуры выданного в копейках | [optional] [readonly]
**sync_id** | **string** | ID синхронизации | [optional]
**updated** | **string** | Момент последнего обновления Счета-фактуры выданного | [optional] [readonly]
**advance_payment_vat** | **int** | Ставка НДС для авансового платежа (в процентах) | [optional]
**payment_purpose** | **string** | Назначение платежа | [optional]
**vat_sum** | **float** | Сумма включая НДС | [optional] [readonly]
**demands** | [**\OpenAPI\Client\Model\Meta[]**](Meta.md) | Связанные отгрузки (метаданные) | [optional]
**payments** | [**\OpenAPI\Client\Model\Meta[]**](Meta.md) | Связанные входящие платежи (метаданные) | [optional]
**returns** | [**\OpenAPI\Client\Model\Meta[]**](Meta.md) | Связанные возвраты поставщикам (метаданные) | [optional]
**consignee** | [**\OpenAPI\Client\Model\Meta**](Meta.md) | Грузополучатель (контрагент или юрлицо) | [optional]
**payment_number** | **string** | Название платежного документа | [optional]
**payment_date** | **string** | Дата платежного документа | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
