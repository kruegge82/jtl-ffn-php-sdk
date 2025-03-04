# # ModelReturn

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**return_id** | **string** |  |
**merchant_id** | **string** |  |
**warehouse_id** | **string** | Warehouse must be from the fulfiller who received the return |
**merchant_return_number** | **string** |  | [optional]
**fulfiller_return_number** | **string** |  | [optional]
**contact** | **string** |  | [optional]
**internal_note** | **string** | Internal note of the return. | [optional]
**external_note** | **string** | External note of the return. | [optional]
**customer_address** | [**\kruegge82\jtlffn\Model\Address**](Address.md) |  |
**state** | [**\kruegge82\jtlffn\Model\ReturnType**](ReturnType.md) |  |
**items** | [**\kruegge82\jtlffn\Model\ReturnItem[]**](ReturnItem.md) |  |
**modification_info** | [**\kruegge82\jtlffn\Model\ModificationInfo**](ModificationInfo.md) |  | [optional]
**write_lock** | [**\kruegge82\jtlffn\Model\LockStatus**](LockStatus.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
