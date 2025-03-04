# # CreateOutboundShippingPackageRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**freight_option** | [**\kruegge82\jtlffn\Model\FreightOptionType**](FreightOptionType.md) |  | [optional]
**estimated_delivery_date** | **\DateTime** | Estimated delivery date for that package | [optional]
**note** | **string** | Note of that package | [optional]
**tracking_url** | **string** | Tracking URL for that package | [optional]
**identifier** | [**\kruegge82\jtlffn\Model\CreatePackageIdentifierRequest[]**](CreatePackageIdentifierRequest.md) | Package identifier container | [optional]
**shipping_date** | **\DateTime** | Shipping date of the package |
**shipping_method_id** | **string** | Shipping method identifier |
**dimensions** | [**\kruegge82\jtlffn\Model\CreateOutboundShippingPackageDimensionsRequest**](CreateOutboundShippingPackageDimensionsRequest.md) |  | [optional]
**weight** | **float** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
