# # StockChange

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**stock_change_id** | [**\kruegge82\jtlffn\Model\StockChangeId**](StockChangeId.md) |  |
**fulfiller_stock_change_id** | **string** | The stock change id of the fulfiller | [optional]
**stock_level** | **float** | Current stock level. This stock level is available for shipment |
**stock_level_reserved** | **float** | Current reserved stock level. Stock reservation is caused by outbounds |
**stock_level_blocked** | **float** | Current blocked stock level. Blocked stock is caused by the fulfiller |
**stock_level_announced** | **float** | Current announced stock level. Announced stock is caused by inbounds |
**quantity** | **float** | The available quantity which has changed in this stock change. Available quantity can be used to fulfill outbounds |
**quantity_reserved** | **float** | The reserved quantity which has changed in this stock change |
**quantity_blocked** | **float** | The blocked quantity which has changed in this stock change |
**quantity_announced** | **float** | The announced quantity which has changed in this stock change |
**batch** | **string** | The product batch of the stock change | [optional]
**best_before** | [**\kruegge82\jtlffn\Model\BestBefore**](BestBefore.md) |  | [optional]
**change_type** | [**\kruegge82\jtlffn\Model\StockChangeType**](StockChangeType.md) |  |
**outbound_item** | [**\kruegge82\jtlffn\Model\StockChangeOutboundItem**](StockChangeOutboundItem.md) |  | [optional]
**inbound_item** | [**\kruegge82\jtlffn\Model\StockChangeInboundItem**](StockChangeInboundItem.md) |  | [optional]
**return_item** | [**\kruegge82\jtlffn\Model\StockChangeReturnItem**](StockChangeReturnItem.md) |  | [optional]
**outbound_shipping_notification_item** | [**\kruegge82\jtlffn\Model\StockChangeOutboundShippingNotificationItem**](StockChangeOutboundShippingNotificationItem.md) |  | [optional]
**note** | **string** | Note of the stock change. The fulfiller can use this note to inform the merchant why this stock change occured | [optional]
**current** | **bool** |  |
**modification_info** | [**\kruegge82\jtlffn\Model\ModificationInfo**](ModificationInfo.md) |  |
**merchant_sku** | **string** | SKU (Stock Keeping Unit) of the merchant |
**fulfiller_timestamp** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
