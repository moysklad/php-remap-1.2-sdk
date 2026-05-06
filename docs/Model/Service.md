# # Service

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID услуги | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**archived** | **bool** | Добавлена ли услуга в архив | [optional]
**name** | **string** | Наименование услуги | [optional]
**code** | **string** | Код услуги | [optional]
**external_code** | **string** | Внешний код услуги | [optional]
**path_name** | **string** | Наименование группы, в которую входит услуга | [optional] [readonly]
**description** | **string** | Описание услуги | [optional]
**vat** | **int** | НДС % | [optional]
**vat_enabled** | **bool** | Включен ли НДС для услуги | [optional]
**use_parent_vat** | **bool** | Используется ли ставка НДС родительской группы | [optional]
**effective_vat** | **int** | Реальный НДС % | [optional] [readonly]
**effective_vat_enabled** | **bool** | Дополнительный признак для определения разграничения реального НДС | [optional] [readonly]
**discount_prohibited** | **bool** | Признак запрета скидок | [optional]
**shared** | **bool** | Общий доступ | [optional]
**group** | [**\OpenAPI\Client\Model\Group**](Group.md) |  | [optional]
**owner** | [**\OpenAPI\Client\Model\Employee**](Employee.md) | Метаданные владельца (Сотрудника) | [optional]
**updated** | **string** | Момент последнего обновления сущности | [optional] [readonly]
**buy_price** | [**\OpenAPI\Client\Model\BuyPrice**](BuyPrice.md) |  | [optional]
**sale_prices** | [**\OpenAPI\Client\Model\SalePrice[]**](SalePrice.md) | Цены продажи | [optional]
**uom** | [**\OpenAPI\Client\Model\Uom**](Uom.md) | Метаданные единиц измерения | [optional]
**product_folder** | [**\OpenAPI\Client\Model\ProductFolder**](ProductFolder.md) | Метаданные группы Услуги | [optional]
**files** | [**\OpenAPI\Client\Model\FileList**](FileList.md) | Метаданные массива Файлов | [optional]
**barcodes** | [**\OpenAPI\Client\Model\Barcode[]**](Barcode.md) | Штрихкоды услуги | [optional]
**payment_item_type** | **string** | Признак предмета расчета. Известные значения описаны в PaymentItemType | [optional]
**tax_system** | **string** | Код системы налогообложения. Известные значения описаны в TaxSystem | [optional]
**attributes** | [**\OpenAPI\Client\Model\AttributeAbstract[]**](AttributeAbstract.md) | Дополнительные поля | [optional]
**min_price** | [**\OpenAPI\Client\Model\MinPrice**](MinPrice.md) |  | [optional]
**sync_id** | **string** | ID синхронизации | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
