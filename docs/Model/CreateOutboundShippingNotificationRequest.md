# # CreateOutboundShippingNotificationRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**outbound_shipping_notification_id** | **string** | Outbound shipping notification identifier If not provided, one will be generated. | [optional]
**fulfiller_shipping_notification_number** | **string** | Fulfiller outbound shipping notification number |
**items** | [**\kruegge82\jtlffn\Model\CreateOutboundShippingNotificationItemRequest[]**](CreateOutboundShippingNotificationItemRequest.md) | Affected items by the shipping notification |
**packages** | [**\kruegge82\jtlffn\Model\CreateOutboundShippingPackageRequest[]**](CreateOutboundShippingPackageRequest.md) | Information about packages in the shipment notification |
**note** | **string** | Note of an outbound shipping notification | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
