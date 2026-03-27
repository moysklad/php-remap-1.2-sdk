# # EmployeeSecurity

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_active** | **bool** | Доступ к сервису МойСклад | [optional]
**login** | **string** | Логин сотрудника для входа в МойСклад | [optional]
**email** | **string** | Почта сотрудника | [optional]
**group** | [**\OpenAPI\Client\Model\EmployeeSecurityGroup**](EmployeeSecurityGroup.md) |  | [optional]
**authorized_hosts** | **string[]** | Список ipv4 адресов, с которых разрешен доступ на аккаунт | [optional]
**authorized_ip_network** | **string** | Ipv4 адрес, идентифицирующий соответствующую подсеть, с правом доступа на аккаунт | [optional]
**authorized_ip_netmask** | **string** | Маска подсети с правом доступа на аккаунт | [optional]
**role** | [**\OpenAPI\Client\Model\EmployeeRole**](EmployeeRole.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
