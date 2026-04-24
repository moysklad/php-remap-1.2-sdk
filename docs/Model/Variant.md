# # Variant

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID Модификации | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**updated** | **string** | Момент последнего обновления сущности | [optional] [readonly]
**name** | **string** | Наименование Модификации | [optional]
**code** | **string** | Код Модификации | [optional]
**external_code** | **string** | Внешний код Модификации | [optional]
**archived** | **bool** | Добавлена ли Модификация в архив | [optional]
**description** | **string** | Описание Модификации | [optional]
**discount_prohibited** | **bool** | Признак запрета скидок | [optional]
**product** | [**\OpenAPI\Client\Model\Product**](Product.md) |  | [optional]
**characteristics** | [**\OpenAPI\Client\Model\VariantCharacteristicValue[]**](VariantCharacteristicValue.md) | Характеристики Модификации | [optional]
**sale_prices** | [**\OpenAPI\Client\Model\SalePrice[]**](SalePrice.md) | Цены продажи | [optional]
**buy_price** | [**\OpenAPI\Client\Model\BuyPrice**](BuyPrice.md) | Закупочная цена | [optional]
**min_price** | [**\OpenAPI\Client\Model\MinPrice**](MinPrice.md) |  | [optional]
**barcodes** | [**\OpenAPI\Client\Model\Barcode[]**](Barcode.md) | Штрихкоды Модификации | [optional]
**packs** | [**\OpenAPI\Client\Model\VariantPack[]**](VariantPack.md) | Упаковки Модификации | [optional]
**images** | [**\OpenAPI\Client\Model\ImageList**](ImageList.md) | Массив метаданных Изображений | [optional]
**minimum_stock** | [**\OpenAPI\Client\Model\MinimumStockAbstract**](MinimumStockAbstract.md) | Неснижаемый остаток. Не выводится по умолчанию. Для получения передайте параметр &#x60;?fields&#x3D;minimumStock&#x60;. | [optional]
**things** | **string[]** | Серийные номера | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
