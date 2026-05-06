# # CreateContractsBatch200ResponseInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID Договора | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**name** | **string** | Номер договора | [optional]
**description** | **string** | Описание Договора | [optional]
**code** | **string** | Код Договора | [optional]
**external_code** | **string** | Внешний код Договора | [optional]
**archived** | **bool** | Добавлен ли Договор в архив | [optional]
**moment** | **string** | Дата Договора | [optional]
**sum** | **int** | Сумма Договора | [optional]
**contract_type** | **string** | Тип Договора. Известные значения описаны в ContractType | [optional]
**reward_type** | **string** | Тип Вознаграждения. Известные значения описаны в RewardType | [optional]
**reward_percent** | **int** | Вознаграждение в процентах (от 0 до 100) | [optional]
**shared** | **bool** | Общий доступ | [optional]
**printed** | **bool** | Напечатан ли документ | [optional] [readonly]
**published** | **bool** | Опубликован ли документ | [optional] [readonly]
**updated** | **string** | Момент последнего обновления сущности | [optional] [readonly]
**owner** | [**\OpenAPI\Client\Model\Employee**](Employee.md) | Метаданные владельца (Сотрудника) | [optional]
**group** | [**\OpenAPI\Client\Model\Group**](Group.md) |  | [optional]
**own_agent** | [**\OpenAPI\Client\Model\Organization**](Organization.md) |  | [optional]
**agent** | [**\OpenAPI\Client\Model\Counterparty**](Counterparty.md) |  | [optional]
**state** | [**\OpenAPI\Client\Model\State**](State.md) | Метаданные статуса договора | [optional]
**organization_account** | [**\OpenAPI\Client\Model\Account**](Account.md) | Метаданные счета вашего юрлица | [optional]
**agent_account** | [**\OpenAPI\Client\Model\Account**](Account.md) | Метаданные счета контрагента | [optional]
**rate** | [**\OpenAPI\Client\Model\CurrencyRate**](CurrencyRate.md) |  | [optional]
**attributes** | [**\OpenAPI\Client\Model\AttributeAbstract[]**](AttributeAbstract.md) | Коллекция доп. полей | [optional]
**errors** | [**\OpenAPI\Client\Model\ErrorErrorsInner[]**](ErrorErrorsInner.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
