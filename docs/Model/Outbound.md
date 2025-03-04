# # Outbound

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**outbound_id** | **string** | Outbound identifier |
**merchant_id** | **string** | Merchant identifier |
**external_number** | **string** | External outbound number | [optional]
**status** | [**\kruegge82\jtlffn\Model\OutboundStatusType**](OutboundStatusType.md) |  |
**priority** | **int** | Priority of the outbound |
**merchant_outbound_number** | **string** | Merchant order number |
**warehouse_id** | **string** | Warehouse identifier |
**currency** | **string** | Currency |
**internal_note** | **string** | Internal note of the outbound. This note is for the fulfiller only | [optional]
**external_note** | **string** | External note of the outbound. This note can be shown to the customer who will receive the shipment | [optional]
**premium_type** | [**\kruegge82\jtlffn\Model\PremiumType**](PremiumType.md) |  | [optional]
**sales_channel** | **string** | Sales channel | [optional]
**attributes** | [**\kruegge82\jtlffn\Model\Attribute[]**](Attribute.md) | Attributes of the outbound. Attributes are flexible custom fields |
**desired_delivery_date** | **\DateTime** | Desired delivery date | [optional]
**shipping_method_id** | **string** | Shipping method identifier. You can either specify a shiiping method id or a shipping type in an outbound | [optional]
**shipping_type** | [**\kruegge82\jtlffn\Model\ShippingType**](ShippingType.md) |  | [optional]
**shipping_address** | [**\kruegge82\jtlffn\Model\Address**](Address.md) |  |
**sender_address** | [**\kruegge82\jtlffn\Model\Address**](Address.md) |  | [optional]
**cancel_reason_code** | **string** |  | [optional]
**cancel_reason** | **string** | An cancellation reason in case this outbound is cancelled | [optional]
**shipping_fee** | **float** | Shipping fee of the outbound | [optional]
**order_value** | **float** | Order value of the outbound | [optional]
**items** | [**\kruegge82\jtlffn\Model\OutboundItem[]**](OutboundItem.md) | Items included in the outbound |
**attachments** | [**\kruegge82\jtlffn\Model\OutboundAttachment[]**](OutboundAttachment.md) | Attachments for the outbounds. For example an invoice in PDF format |
**modification_info** | [**\kruegge82\jtlffn\Model\ModificationInfo**](ModificationInfo.md) |  |
**status_timestamp** | [**\kruegge82\jtlffn\Model\StatusTimestamp**](StatusTimestamp.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
