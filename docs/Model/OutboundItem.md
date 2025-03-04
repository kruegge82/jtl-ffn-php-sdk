# # OutboundItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**outbound_item_id** | **string** | Outbound item identifier |
**jfsku** | **string** | Product identifer | [optional]
**item_type** | [**\kruegge82\jtlffn\Model\ItemType**](ItemType.md) |  |
**quantity** | **float** | Quantity of that outbound item. This quantity of that item shall be shipped to the customer |
**quantity_open** | **float** | Quantity of the outbound item which is not shipped yet |
**name** | **string** | Name of the outbound item | [optional]
**merchant_sku** | **string** | The SKU (stock keeping unit) of the merchant for that outbound item | [optional]
**external_number** | **string** | External number for that outbound item | [optional]
**price** | **float** | Price of that outbound item. Is used for insurance and / or customs duty issues | [optional]
**vat** | **float** | VAT of that outbound item | [optional]
**bill_of_materials_id** | **string** | Id of the bill of materials product. Has to be filled if this item is a component of a bill of materials | [optional]
**note** | **string** | Note of the outbound item | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
