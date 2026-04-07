# # InternalOrder

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID Внутреннего заказа | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**name** | **string** | Наименование Внутреннего заказа | [optional]
**code** | **string** | Код Внутреннего заказа | [optional]
**external_code** | **string** | Внешний код Внутреннего заказа | [optional]
**sync_id** | **string** | ID синхронизации | [optional]
**description** | **string** | Комментарий Внутреннего заказа | [optional]
**created** | **string** | Дата создания | [optional] [readonly]
**deleted** | **string** | Момент последнего удаления Внутреннего заказа | [optional] [readonly]
**updated** | **string** | Момент последнего обновления Внутреннего заказа | [optional] [readonly]
**moment** | **string** | Дата документа | [optional]
**delivery_planned_moment** | **string** | Планируемая дата приемки | [optional]
**applicable** | **bool** | Отметка о проведении | [optional]
**printed** | **bool** | Напечатан ли документ | [optional] [readonly]
**published** | **bool** | Опубликован ли документ | [optional] [readonly]
**shared** | **bool** | Общий доступ | [optional] [readonly]
**vat_enabled** | **bool** | Учитывается ли НДС | [optional]
**vat_included** | **bool** | Включен ли НДС в цену | [optional]
**vat_sum** | **float** | Сумма НДС | [optional] [readonly]
**sum** | **float** | Сумма Внутреннего заказа в копейках | [optional] [readonly]
**organization** | [**\OpenAPI\Client\Model\Organization**](Organization.md) |  | [optional]
**store** | [**\OpenAPI\Client\Model\Store**](Store.md) | Метаданные склада | [optional]
**state** | [**\OpenAPI\Client\Model\State**](State.md) | Метаданные статуса Внутреннего заказа | [optional]
**project** | [**\OpenAPI\Client\Model\Project**](Project.md) | Метаданные проекта | [optional]
**owner** | [**\OpenAPI\Client\Model\Employee**](Employee.md) | Владелец (Сотрудник) | [optional]
**group** | [**\OpenAPI\Client\Model\Group**](Group.md) |  | [optional]
**attributes** | [**\OpenAPI\Client\Model\AttributeAbstract[]**](AttributeAbstract.md) | Коллекция метаданных доп. полей | [optional]
**files** | [**\OpenAPI\Client\Model\FileList**](FileList.md) | Метаданные массива Файлов | [optional]
**rate** | [**\OpenAPI\Client\Model\InternalOrderRate**](InternalOrderRate.md) |  | [optional]
**positions** | [**\OpenAPI\Client\Model\InternalOrderPositionList**](.md) | Позиций Внутреннего заказа | [optional]
**purchase_orders** | [**\OpenAPI\Client\Model\PurchaseOrder[]**](PurchaseOrder.md) | Коллекция метаданных на связанные заказы поставщику | [optional]
**production_tasks** | [**\OpenAPI\Client\Model\ProductionTask[]**](ProductionTask.md) | Массив ссылок на связанные производственные задания | [optional]
**moves** | [**\OpenAPI\Client\Model\Move[]**](Move.md) | Коллекция метаданных на связанные заказы перемещения | [optional]
**processing_order** | [**\OpenAPI\Client\Model\ProcessingOrder**](ProcessingOrder.md) | Метаданные Заказа на производство | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
