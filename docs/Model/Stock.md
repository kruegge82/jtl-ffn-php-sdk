# # Stock

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**jfsku** | **string** | Product identifer |
**stock_level** | **float** | Current stock level. This stock level is available for shipment |
**stock_level_reserved** | **float** | Current reserved stock level. Stock reservation is caused by outbounds |
**stock_level_blocked** | **float** | Current blocked stock level. Blocked stock is caused by the fulfiller |
**stock_level_announced** | **float** | Current announced stock level. Announced stock is caused by inbounds |
**stock_level_details** | [**\kruegge82\jtlffn\Model\StockLevelDetail[]**](StockLevelDetail.md) | Stock level details itemized by batch and/or best before date |
**stock_reserved_details** | [**\kruegge82\jtlffn\Model\StockReservedDetail[]**](StockReservedDetail.md) | Reserved stock level details |
**stock_announced_details** | [**\kruegge82\jtlffn\Model\StockAnnouncedDetail[]**](StockAnnouncedDetail.md) | Announced stock level details |
**warehouses** | [**\kruegge82\jtlffn\Model\StockInWarehouse[]**](StockInWarehouse.md) | Stock information distributed over all warehouses this product is located |
**merchant_sku** | **string** | SKU (Stock Keeping Unit) of the merchant |
**fulfiller_timestamp** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
