# # ReturnItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**return_item_id** | **string** | The SKU (stock keeping unit) of the merchant for that outbound item |
**jfsku** | **string** | Product identifer |
**merchant_sku** | **string** | The SKU (stock keeping unit) of the merchant for that return item |
**name** | **string** | Product name |
**outbound_id** | **string** | Outbound Identifier | [optional]
**outbound_item_id** | **string** | Outbound item identifier | [optional]
**quantity** | **float** | Quantity of that return item. This quantity of that item shall be shipped to the customer |
**reason** | [**\kruegge82\jtlffn\Model\ReturnReasonType**](ReturnReasonType.md) |  |
**reason_note** | **string** | Internal note of the outbound. This note is for the fulfiller only | [optional]
**condition_note** | **string** | Internal note of the outbound. This note is for the fulfiller only | [optional]
**state** | [**\kruegge82\jtlffn\Model\ReturnType**](ReturnType.md) |  |
**condition** | [**\kruegge82\jtlffn\Model\ConditionType**](ConditionType.md) |  |
**stock_changes** | [**\kruegge82\jtlffn\Model\ReturnItemStockChange[]**](ReturnItemStockChange.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
