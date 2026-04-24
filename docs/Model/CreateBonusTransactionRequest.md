# # CreateBonusTransactionRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meta** | [**\OpenAPI\Client\Model\Meta**](Meta.md) |  | [optional]
**id** | **string** | ID бонусной операции | [optional] [readonly]
**account_id** | **string** | ID учетной записи | [optional] [readonly]
**owner** | [**\OpenAPI\Client\Model\Employee**](Employee.md) |  | [optional]
**agent** | [**\OpenAPI\Client\Model\Counterparty**](Counterparty.md) |  | [optional]
**group** | [**\OpenAPI\Client\Model\Group**](Group.md) |  | [optional]
**organization** | [**\OpenAPI\Client\Model\Organization**](Organization.md) |  | [optional]
**parent_document** | [**\OpenAPI\Client\Model\Meta**](Meta.md) | Метаданные связанного документа бонусной операции | [optional]
**applicable** | **bool** | Отметка о проведении | [optional]
**bonus_program** | [**\OpenAPI\Client\Model\BonusProgram**](BonusProgram.md) |  | [optional]
**bonus_value** | **int** | Количество бонусных баллов | [optional]
**transaction_type** | **string** | Тип бонусной операции | [optional]
**transaction_status** | **string** | Статус бонусной операции | [optional] [readonly]
**category_type** | **string** | Категория бонусной операции | [optional] [readonly]
**code** | **string** | Код бонусной операции | [optional]
**name** | **string** | Наименование бонусной операции | [optional]
**external_code** | **string** | Внешний код бонусной операции | [optional]
**description** | **string** | Комментарий к бонусной операции | [optional]
**moment** | **string** | Время проведения бонусной операции | [optional]
**created** | **string** | Момент создания бонусной операции | [optional] [readonly]
**updated** | **string** | Момент последнего обновления бонусной операции | [optional] [readonly]
**execution_date** | **string** | Дата начисления бонусной операции | [optional]
**shared** | **bool** | Общий доступ | [optional]
**updated_by** | **string** | Автор последнего обновления (uid, используется для фильтрации) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
