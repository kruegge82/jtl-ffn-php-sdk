# # CreateReturnRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**return_id** | **string** |  | [optional]
**merchant_id** | **string** |  |
**warehouse_id** | **string** | Warehouse must be from the fulfiller who delivered the outbound |
**internal_note** | **string** | Internal note of the outbound. This note is for the fulfiller only | [optional]
**external_note** | **string** | External note of the outbound. This note can be shown to the customer who will receive the shipment | [optional]
**fulfiller_return_number** | **string** |  |
**customer_address** | [**\kruegge82\jtlffn\Model\CreateAddressRequest**](CreateAddressRequest.md) |  |
**items** | [**\kruegge82\jtlffn\Model\CreateReturnItemRequest[]**](CreateReturnItemRequest.md) |  |
**contact** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
