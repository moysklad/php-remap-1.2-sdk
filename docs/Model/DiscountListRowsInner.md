# # DiscountListRowsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**all_products** | **bool** | Для всех ли товаров скидка | [optional]
**assortment** | [**\OpenAPI\Client\Model\DiscountAssortmentItem[]**](DiscountAssortmentItem.md) | Товары, услуги и модификации со скидкой | [optional]
**product_folders** | [**\OpenAPI\Client\Model\ProductFolder[]**](ProductFolder.md) | Группы товаров со скидкой | [optional]
**id** | **string** | ID дополнительного поля | [optional] [readonly]
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**name** | **string** | Наименование товара | [optional]
**active** | **bool** | Включена ли скидка | [optional]
**all_agents** | **bool** | Для всех ли агентов скидка | [optional]
**agent_tags** | **string[]** | Тэги агентов | [optional]
**use_price_type** | **bool** | Использовать ли специальную цену | [optional]
**discount** | **float** | Процент скидки (используется при usePriceType&#x3D;false) | [optional]
**special_price** | **object** | Спец. цена (используется при usePriceType&#x3D;true) | [optional]
**levels** | **object[]** | Проценты скидок при определенной сумме продаж | [optional]
**earn_rate_roubles_to_point** | **int** | Курс начисления | [optional]
**earn_while_redeeming** | **bool** | Разрешить одновременное начисление и списание бонусов | [optional]
**postponed_bonuses_delay_days** | **int** | Баллы начисляются через N дней | [optional]
**spend_rate_points_to_rouble** | **int** | Курс списания | [optional]
**welcome_bonuses_enabled** | **bool** | Возможность начисления приветственных баллов | [optional]
**welcome_bonuses_value** | **int** | Количество приветственных баллов, начисляемых участникам бонусной программы | [optional]
**welcome_bonuses_mode** | **string** | Условие начисления приветственных баллов. Известные значения описаны в WelcomeBonusesMode | [optional]
**max_paid_rate_percents** | **int** | Максимальный процент оплаты баллами | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
