# # CreateStockAdjustmentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**fulfiller_stock_change_id** | **string** | The stock change id of the fulfiller | [optional]
**jfsku** | **string** | Product identifer |
**warehouse_id** | **string** | Warehouse identifier |
**quantity** | **float** | This quantity is available for shipment | [optional]
**quantity_blocked** | **float** | This quantity exists in the warehouse but is not available for shipment yet | [optional]
**batch** | **string** | The product batch of the stock adjustment | [optional]
**best_before** | [**\kruegge82\jtlffn\Model\CreateBestBeforeRequest**](CreateBestBeforeRequest.md) |  | [optional]
**note** | **string** | Note of that stock adjustment | [optional]
**fulfiller_timestamp** | **\DateTime** | Internal timestamp of the fulfiller when he has performed that stock adjustment |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
