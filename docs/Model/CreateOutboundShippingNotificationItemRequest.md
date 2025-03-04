# # CreateOutboundShippingNotificationItemRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**merchant_sku** | **string** | SKU (Stock Keeping Unit) of the merchant One of Jfsku or merchantSku must be given | [optional]
**jfsku** | **string** | Product identifer | [optional]
**warehouse_id** | **string** | WarehouseId | [optional]
**quantity** | **float** | Quantity of the item which has been shipped within that outbound shipping notification |
**note** | **string** | Note of the outbound shipping notification | [optional]
**best_before** | [**\kruegge82\jtlffn\Model\CreateBestBeforeRequest**](CreateBestBeforeRequest.md) |  | [optional]
**batch** | **string** | Batch of the item within the outbound shipping notification | [optional]
**serialnumbers** | **string[]** | Serial numbers of the item within the outbound shipping notification | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
