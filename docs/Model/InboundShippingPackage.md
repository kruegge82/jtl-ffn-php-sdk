# # InboundShippingPackage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**estimated_delivery_date** | **\DateTime** | Estimated delivery date for that package | [optional]
**freight_option** | [**\kruegge82\jtlffn\Model\FreightOptionType**](FreightOptionType.md) |  |
**note** | **string** | Note of that package | [optional]
**tracking_url** | **string** | Tracking URL for that package | [optional]
**carrier_code** | **string** | Carrier Code for that package | [optional]
**carrier_name** | **string** | Carrier Name for that package | [optional]
**identifier** | [**\kruegge82\jtlffn\Model\PackageIdentifier[]**](PackageIdentifier.md) | Package identifier container |
**shipment_count** | **int** | Number of parcels / containers / etc. in that package | [optional]
**shipping_date** | **\DateTime** | Shipping date of the package |
**dimensions** | [**\kruegge82\jtlffn\Model\InboundShippingPackageDimensions**](InboundShippingPackageDimensions.md) |  | [optional]
**weight** | **float** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
