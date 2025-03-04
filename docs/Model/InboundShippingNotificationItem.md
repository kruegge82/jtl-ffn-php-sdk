# # InboundShippingNotificationItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**inbound_shipping_notification_item_id** | **string** | Inbound item identifier |
**jfsku** | **string** | Product identifer |
**quantity** | **float** | Quantity of that inbound item |
**note** | **string** | Note of the inbound | [optional]
**package_id** | **int** | Specifies the package that contains the item. The id is the position of the package within the corresponding array | [optional]
**best_before** | [**\kruegge82\jtlffn\Model\BestBefore**](BestBefore.md) |  | [optional]
**batch** | **string** | Batch of the item within the inbound shipping notification | [optional]
**serialnumbers** | **string[]** | Serial numbers of the item within the inbound shipping notification |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
