# # CompanySettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**currency** | [**\OpenAPI\Client\Model\Currency**](Currency.md) |  | [optional]
**price_types** | [**\OpenAPI\Client\Model\PriceType[]**](PriceType.md) | Коллекция всех существующих типов цен | [optional]
**discount_strategy** | **string** | Совместное применение скидок. Известные значения описаны в DiscountStrategy | [optional]
**global_operation_numbering** | **bool** | Использовать сквозную нумерацию документов | [optional]
**check_shipping_stock** | **bool** | Запретить отгрузку отсутствующих товаров | [optional]
**check_min_price** | **bool** | Автоматически устанавливать минимальную цену | [optional]
**use_recycle_bin** | **bool** | Использовать корзину | [optional]
**use_company_address** | **bool** | Использовать адрес компании для электронных писем | [optional]
**company_address** | **string** | Адрес компании для электронных писем | [optional]
**account_country** | **string** | Страновая конфигурация аккаунта | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
