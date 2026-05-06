# # BonusProgram

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**earn_rate_roubles_to_point** | **int** | Курс начисления | [optional]
**earn_while_redeeming** | **bool** | Разрешить одновременное начисление и списание бонусов | [optional]
**postponed_bonuses_delay_days** | **int** | Баллы начисляются через N дней | [optional]
**spend_rate_points_to_rouble** | **int** | Курс списания | [optional]
**welcome_bonuses_enabled** | **bool** | Возможность начисления приветственных баллов | [optional]
**welcome_bonuses_value** | **int** | Количество приветственных баллов, начисляемых участникам бонусной программы | [optional]
**welcome_bonuses_mode** | **string** | Условие начисления приветственных баллов. Известные значения описаны в WelcomeBonusesMode | [optional]
**max_paid_rate_percents** | **int** | Максимальный процент оплаты баллами | [optional]
**all_products** | **bool** | Для всех ли товаров скидка | [optional]
**id** | **string** | ID дополнительного поля | [optional] [readonly]
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**name** | **string** | Наименование товара | [optional]
**active** | **bool** | Включена ли скидка | [optional]
**all_agents** | **bool** | Для всех ли агентов скидка | [optional]
**agent_tags** | **string[]** | Тэги агентов | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
